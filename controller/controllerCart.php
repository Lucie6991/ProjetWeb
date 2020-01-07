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
        $message="";
        if (!empty($_SESSION['username'])){
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
            $registered = 1;
        }
        else{
            $id_customer=session_id();
            $registered = 0;
        }
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
        $message="";
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
        $message="";
        if (!empty($_SESSION['username'])){
            $id_customer= Login::getCustomerIdOfUser($_SESSION['username']);
        }
        else{
            $id_customer=session_id();
        }
        $id_order = Orders::getOrderID($id_customer);
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
}