<?php

$path= File::build_path(array('model','Orders.php'));
require_once ($path);


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

}