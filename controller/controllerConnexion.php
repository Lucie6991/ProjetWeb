<?php
$path= File::build_path(array('model','Login.php'));
require_once ($path);
$path3= File::build_path(array('model','Customer.php'));
require_once ($path3);

class controllerConnexion
{
    public static function readCustomer(){
        $view='TestConnexion';
        $page_title='Connexion';
        $controller = "user";

        $log = $_POST['login'];
        $mdp = $_POST['password'];
        $tab_log = Login::getLoginUser($log, $mdp);

        //if (isset ($_POST['login']) && isset($_POST['mdp'])){
            $customer =  Customer::getUtilisateurCo($log, $mdp);
        $_SESSION['username'] = $log;
       // }
        $customer_id = Login::getCustomerIdOfUser($log);
        // si il existe un panier à son nom alors on recupere l'order ID et changer le customerID
        if ( Orders::existsOrder($customer_id)){
            $order_id = Orders::getOrderID($customer_id) ;
            Orders::updateCustomerId($customer_id, $order_id);
        }
        else if (Orders::existsOrder(session_id())){
            $order_id = Orders::getOrderID(session_id()) ;
            Orders::updateCustomerId($customer_id, $order_id);
        }
        if (empty ($customer)){
            $path2 = File::build_path(array('view',$controller,'error.php'));   //error car ca veut dire il n'y a pas de clients avec ces identifiants
        }
        else{
            $path2 = File::build_path(array('view',$controller,'view.php'));
        }
        require_once ($path2);
    }

    public static function addedCustomer(){
        if (isset($_POST["forname"]) && isset($_POST["surname"])){
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
            $customer=Customer::addCustomer($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e);
            $customer_id=Customer::getCustomerID($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e);
            Login::addLogin($customer_id, $un, $pw);
        }
        $view='addedCustomer';
        $controller="user";
        $page_title='Client ajouté';
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    public static function readLogin(){
        $view='TestConnexion';
        $page_title='Connexion';
        $controller = "user";
        $log=$_POST['login'];
        $mdp = $_POST['password'];
        $tab_log = Login::getLoginUser($log, $mdp);
        if (empty($tab_log)){
            $path2 = File::build_path(array('view',$controller,'error.php'));
            require_once ($path2);
        }
        else {
            $path2 = File::build_path(array('view', $controller,'view.php'));
            require_once($path2);
        }
    }

    public static function connect(){
        $view='connexion';
        $page_title='Connexion';
        $controller = "user";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function add(){
        $view='FormCustomer';
        $page_title='Ajout d\'un client';
        $controller = "user";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function deconnect(){
        $view='deconnexion';
        $page_title='Deconnexion';
        $controller = "user";
        $_SESSION['username'] = "";
        $_SESSION['customer_id'] = NULL;
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }


}