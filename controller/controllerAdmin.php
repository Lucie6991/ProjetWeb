<?php

$path= File::build_path(array('model','Orders.php'));
require_once ($path);
$path2= File::build_path(array('model','Customer.php'));
require_once ($path2);
$path3= File::build_path(array('model','DeliveryAdress.php'));
require_once ($path3);
$path4= File::build_path(array('model','Cart.php'));
require_once ($path4);


class controllerAdmin
{

    public static function readAllOrders(){
        $view = "listOrders";
        $page_title='Liste des commandes';
        $controller = "admin";
        $tab_orders = Orders::getAllOrders();
        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }

    public static function addNewCat(){
        $view = "formAddCat";
        $page_title="Ajout d'une catégorie";
        $controller = "admin";
        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }

    public static function addNewProduct(){
        $view = "formAddProduct";
        $page_title="Ajout d'un produit";
        $controller = "admin";
        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }


    public static function readOrder(){
        $view = "detailOrder";
        $page_title="Detail de la commande";
        $controller = "admin";
        if (isset($_GET["order"])){
            $id_order=$_GET["order"];
            $tab_customer = Customer::getCustomer($id_order);
            $tab_order_item = Orders::getOrderItems($id_order);
            $tab_order= Orders::getOrder($id_order);
            $tab_adress = DeliveryAdress::getDelivery_adress($id_order);
            $nameFile = "order".$id_order;
        }
        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }

    public static function confirmOrder(){
        if (isset ($_GET['order'])){
            $id_order=$_GET['order'];
            Orders::updateStatus(10,$id_order);
        }
        self::readAllOrders();
    }

    public static function seeBill(){
        $view = "bill";
        $controller = "admin";
        if (isset ($_GET['order'])){
            $id_order=$_GET["order"];
            $nameFile= "order".$id_order;
        }
        $page_title="Facture de la commande";
        //$path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        $path2 = File::build_path(array('view', $controller,'bill.php'));
        require_once ($path2);
    }

    public static function seeOrdersByChecks(){
        $view = "validateChecks";
        $controller = "admin";
        $page_title="Valider la réception des chèques";
        $tab_cheque = Orders::getAllOrdersPaidByCheck();
        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }

    public static function validateCheck(){
        if (isset($_GET["order"])){
            $id_order = $_GET["order"];
            Orders::updateStatus(3, $id_order);
        }
        self::seeOrdersByChecks();
    }

    public static function addStock(){
        $view = "addStock";
        $controller = "admin";
        $page_title="Ajouter du stock";
        $tab_product = Product::getAllProducts();
        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }

    public static function updateStock(){
        if (isset ($_POST["stock"]) && isset($_POST["prod"])){
            $product = Product::getProduit($_POST["prod"]);
            $quantity = ($product[0]->getQuantity())+$_POST["stock"];
            $product[0]->updateStock($quantity);
            $page_title = "Stock ajouté";
            $view = "addStock";
            $controller = "admin";
            $message ="Le stock pour le produit a été ajouté !";
            $tab_product = Product::getAllProducts();
            $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
            require_once ($path2);
        }
    }

    public static function addAdmin(){
        $view = "formAddAdmin";
        $controller = "admin";
        $page_title="Ajouter un admin";
        $path2 = File::build_path(array('view',$controller,'viewAdmin.php'));
        require_once ($path2);
    }

    public static function addedAdmin(){
        $view = "formAddAdmin";
        $controller = "admin";
        $page_title="Ajouter un admin";
        $log = $_POST['login'];
        $pw = $_POST['password'];

        $tab_admin = Admin::getAdmin($log, $pw);
        if (!empty($tab_admin)){
            $message="L'administrateur n'a pas été ajouté car il existe déjà";

        }
        else {
            Admin::addAdmin($log, sha1($pw));
            $message = "L'administrateur a bien été ajouté";
        }

        $path2 = File::build_path(array('view', $controller,'viewAdmin.php'));
        require_once ($path2);
    }
}