<?php
$path= File::build_path(array('model','Login.php'));
require_once ($path);
$path3= File::build_path(array('model','Customer.php'));
require_once ($path3);
$path4= File::build_path(array('model','Admin.php'));
require_once ($path4);

class controllerConnexion
{
    public static function readCustomer(){
        $view='TestConnexion';
        $page_title='Connexion';
        $controller = "user";
        $message="";

        //On récupère les identifiants
        $log = $_POST['login'];
        $mdp = $_POST['password'];

        //On cherche si un login customer correspond
        $tab_log = Login::getLoginUser($log, $mdp);
        //On regarde si ce n'est pas un admin
        $admin = Admin::getAdmin($log, $mdp);
        //On récupère les informations du clients associés
        $customer = Customer::getUtilisateurCo($log, $mdp);

        //Si login customer pas vide
        if (!empty($tab_log) && empty($admin)) {

            $_SESSION['username'] = $log;
            $path2 = File::build_path(array('view', $controller, 'view.php'));

            $customer_id = Login::getCustomerIdOfUser($log);
            $_SESSION['customer_id'] = $customer_id;
            // si il existe un panier à son nom alors on recupere l'order ID et changer le customerID
            if ( Orders::existsOrder($customer_id)){
                $order_id = Orders::getOrderID($customer_id) ;
                Orders::updateCustomerId($customer_id, $order_id);
            }
            else if (Orders::existsOrder(session_id())){
                $order_id = Orders::getOrderID(session_id()) ;
                Orders::updateCustomerId($customer_id, $order_id);
            }
        }
        //Si c'est un admin
        else if (empty($tab_log) && !empty($admin)){
            $_SESSION['admin'] = $log;
            //Récupérer admin de id
            //$_SESSION['customer_id'] = $id;
            $path2 = File::build_path(array('view',$controller,'view.php'));
        }

        //Si ce n'est aucun des deux
        else if (empty ($tab_log) && empty ($admin)){
            $username = Login::getUsername($log);
            $password = Login::getPassword($mdp);
            $view='errorConnexion';
            $path2 = File::build_path(array('view',$controller,'view.php'));   //error car ca veut dire il n'y a pas de clients avec ces identifiants
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

            Customer::addCustomer($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e);
            $customer_id=Customer::getCustomerID($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e);
            Login::addLogin($customer_id,$un, $pw);
        }
        $view='addedCustomer';
        $controller="user";
        $page_title='Client ajouté';
        $message="";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    public static function readLogin(){
        $view='TestConnexion';
        $page_title='Connexion';
        $controller = "user";
        $message="";

        $log=$_POST['login'];
        $mdp = $_POST['password'];
        $tab_log = Login::getLoginUser($log, $mdp);

        if (empty($tab_log)){
            $username = Login::getUsername($log);
            $password = Login::getPassword($mdp);
            $message = "Problème de connexion";
            $view='errorConnexion';
            $path2 = File::build_path(array('view',$controller,'view.php'));
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
        $message = "";
        $_SESSION['username'] = "";
        $_SESSION['customer_id'] = "";
        $_SESSION['admin'] = "";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function add(){
        $view='FormCustomer';
        $page_title='Ajout d\'un client';
        $controller = "user";
        $message="";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function deconnect(){
        $view='deconnexion';
        $page_title='Deconnexion';
        $controller = "user";
        $message="";
        $_SESSION['username'] = "";
        $_SESSION['customer_id'] = "";
        $_SESSION['admin'] = "";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }


}