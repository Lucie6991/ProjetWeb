<?php
$path= File::build_path(array('model','Customer.php'));
require_once ($path);

class controllerAdress
{
    public static function readAdress(){
        $view='adress';
        $page_title='Adresse';
        $controller = "user";;
        $message = "";
        var_dump($_SESSION['customer_id']);
        $tab_adress = Customer::getAdress($_SESSION['customer_id']);
        $path2 = File::build_path(array('view',$controller,'view.php'));

        if (empty($tab_address)){
            $view='error';
            $message="Erreur sur l'adresse du client";
            $path2 = File::build_path(array('view',$controller,'view.php'));
        }
        require_once ($path2);
    }
}