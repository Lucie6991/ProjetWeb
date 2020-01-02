<?php
$path= File::build_path(array('model','Cart.php'));
require_once ($path);

class controllerCart
{

    public static function addToCart(){
        $view='addedToCart';
        $page_title='Ajouté au panier';;
        Cart::addToCart($_GET['id'], $_GET['q']);
        $path2= File::build_path(array('view','view.php'));
        require ($path2);
    }

    public static function emptyCart(){
        $view ='cart';
        $page_title='Panier vidé';
        $controller = "user";
        Cart::emptyCart();
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    public static function seeCart(){
        $view ='cart';
        $page_title='Mon panier';
        $controller = "user";
        $tab_cart = Cart::getProducts();
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);

    }

    public static function delete(){
        $order = $_GET["order"];
        Cart::delete($order);
        self::seeCart();
    }
}