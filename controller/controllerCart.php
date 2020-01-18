<?php
// Chargement des modèles nécéssaires pour ce controlleur
$path= File::build_path(array('model','Cart.php'));
require_once ($path);
$path= File::build_path(array('model','Login.php'));
require_once ($path);

class controllerCart
{
    // Ajout d'un produit au panier
    public static function addToCart(){
        $view='addedToCart';
        $page_title='Ajouté au panier';
        $controller = "user";
        // on donne l'attribut registered et id customer en fonction s'il est connecté ou non
        if (!empty($_SESSION['username'])){
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
            $registered = 1;
        }
        else{
            $id_customer=session_id();
            $registered = 0;
        }
        // s'il n'existe pas de commande de status 0 à son nom, on en crée une
        if (!(Orders::existsOrder($id_customer))){
            Orders::createOrder($id_customer,$registered, session_id());
            $id_order = Orders::getOrderID($id_customer);
        }
        else {
            $id_order = Orders::getOrderID($id_customer);
        }
        Cart::addToCart(number_format($id_order),$_GET['id'] ,$_POST['quantite']);
        $tab_product = Product::getProduit($_GET['id']);
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }


    // Vide le panier d'un client
    public static function emptyCart(){
        $view ='cart';
        $page_title='Panier vidé';
        $controller = "user";
        if (!empty($_SESSION['username'])){
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
        }
        else{
            $id_customer=session_id();
        }
        $id_order = Orders::getOrderID($id_customer);
        Cart::emptyCart($id_order);
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    // Permet de regarder le panier du client
    public static function seeCart(){
        $view ='cart';
        $page_title='Mon panier';
        $controller = "user";
        if (!empty($_SESSION['username'])){
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
        }
        else{
            $id_customer=session_id();
            $_SESSION['customer_id'] = $id_customer;
        }
        $id_order = Orders::getOrderID($id_customer);
        if (isset($_POST["codePromo"])){
            if ($_POST["codePromo"] == "LivraisonFree"){
                $code = true;
            }
        }
        $tab_cart = Cart::getProducts($id_order);
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);

    }

    // Enlève un produit au panier d'un client
    public static function delete(){
        $product = $_GET["prod"];
        if (!empty($_SESSION['username']))
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
        else
            $id_customer=session_id();
        $id_order = Orders::getOrderID($id_customer);
        Cart::delete($id_order,$product);
        self::seeCart();
    }


    // Fonction appelée a la fin quand le client clique sur "Payer"
    public static function toPay(){
        if (isset($_POST['paiement'])){
            if ($_POST['paiement'] == 'paypal')
                $status = 3;
            else
                $status = 2;
            $id_order = Orders::getOrderID($_SESSION['customer_id'],1);
            $tabCart = Cart::getProductsStock($id_order);
            // on enleve du stock à chacun des produits
            foreach ($tabCart as $product){
                $id_product = $product["id"];
                $stock = $product["quantity"];
                $qte = $product["qte"];
                Product::getProduit($id_product)[0]->updateStock($stock - $qte);
            }
            $order = Orders::getOrder($id_order);
            $order[0]->lastUpdate(date ("Y/m/d") ,$_POST['paiement'],$status);
        }

        // On fait le récapitulatif de la commande du client
        $tab_customer = Customer::getCustomer($id_order);
        $tab_order_item = Orders::getOrderItems($id_order);
        $tab_order= Orders::getOrder($id_order);
        $tab_cart = Cart::getProducts($id_order);
        $view ='recapOrder';
        $page_title='Commande validée';
        $controller = "user";
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

}