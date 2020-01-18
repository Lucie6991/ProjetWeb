<?php
// On charge les différents modèles nécéssaires
$path= File::build_path(array('model','Login.php'));
require_once ($path);
$path3= File::build_path(array('model','Customer.php'));
require_once ($path3);
$path4= File::build_path(array('model','Orders.php'));
require_once ($path4);

class controllerCustomer
{

    // Ajout d'un client
    public static function add(){
        $view='FormCustomer';
        $page_title="Ajout d'un client";
        $controller = "user";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function addedCustomer(){
        if (isset($_POST["login"]) && isset($_POST["password"])){
            $fn = $_POST["forname"];
            $sn = $_POST["surname"];
            $ad1 = $_POST["add1"];
            $ad2 = $_POST["add2"];
            $c = $_POST["city"];
            $pc = $_POST["postcode"];
            $p = $_POST["phone"];
            $e = $_POST["email"];
            $un = $_POST["login"];
            $pw = $_POST["password"];

            $tab_log=Login::getLoginUser($un, sha1($pw));
            if (!empty($tab_log)){
                $view='error';
                $controller="user";
                $page_title='Erreur';
                $message='Un client existe déjà avec ce nom d\'utilisateur et ce mot de passe';
            }
            else {
                Customer::addCustomer($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e,1);
                $customer_id=Customer::getCustomerID($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e);
                Login::addLogin($customer_id,$un, sha1($pw));
            }
        }
        controllerConnexion::readCustomer();
    }


    // Accès à la page mon compte
    public static function myAccount(){
        $view ="myAccount";
        $page_title="Mon compte";
        $controller = "user";
        $tab_adress = Customer::getAdress($_SESSION['customer_id']);
        $tab_order_cheque = Orders::getOrderByCustomer($_SESSION['customer_id'], 1);
        $tab_order_prep = Orders::getOrderByCustomer($_SESSION['customer_id'], 2);
        $tab_order_liv = Orders::getOrderByCustomer($_SESSION['customer_id'], 3);
        $tab_order_fini = Orders::getOrderByCustomer($_SESSION['customer_id'], 10);
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

}