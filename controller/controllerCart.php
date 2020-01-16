<?php
$path= File::build_path(array('model','Cart.php'));
require_once ($path);
$path= File::build_path(array('model','Login.php'));
require_once ($path);

class controllerCart
{
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

    public static function delete(){
        $product = $_GET["prod"];
        if (!empty($_SESSION['username'])){
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
        }
        else{
            $id_customer=session_id();
        }
        $id_order = Orders::getOrderID($id_customer);
        Cart::delete($id_order,$product);
        self::seeCart();
    }

    public static function toPay(){
        if (isset($_POST['paiement'])){
            if ($_POST['paiement'] == 'paypal'){
                $status = 3;
            }
            else
                $status = 2;

            $id_order = Orders::getOrderID($_SESSION['customer_id'],1);
            echo $_SESSION['customer_id'];
            echo "<br>";
            echo $id_order;
            $tabCart = Cart::getProductsStock($id_order);

            foreach ($tabCart as $product){
                $id_product = $product["id"];
                //echo $id_product;
                $stock = $product["quantity"];
                //echo $stock;
                $qte = $product["qte"];
                //echo $qte;
                Product::getProduit($id_product)[0]->updateStock($stock - $qte);
            }
            $order = Orders::getOrder($id_order);
            var_dump($order);
            $order[0]->lastUpdate(date ("Y/m/d") ,$_POST['paiement'],$status);
        }
        $view ='recapOrder';
        $page_title='Commande validée';
        $controller = "user";
        //session_regenerate_id();
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

}