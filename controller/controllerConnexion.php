<?php
$path= File::build_path(array('model','Login.php'));
require_once ($path);
$path3= File::build_path(array('model','Customer.php'));
require_once ($path3);
$path4= File::build_path(array('model','Admin.php'));
require_once ($path4);
$path5= File::build_path(array('model','Cart.php'));
require_once ($path5);

class controllerConnexion
{
    public static function readCustomer(){
        $view='TestConnexion';
        $page_title='Connexion';
        $controller = "user";

        if (isset ($_POST['login']) && isset ($_POST['password'])){
        //On récupère les identifiants
        $log = $_POST['login'];
        $mdp = sha1($_POST['password']);}

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

            // si il existe un panier à son nom alors on recupere l'order ID et changer le customerID et registered=1
            if ( Orders::existsOrder($customer_id)){
                $order_id = Orders::getOrderID($customer_id) ;
                Orders::updateCustomerId($customer_id, 1,$order_id);
            }
            else if (Orders::existsOrder(session_id())){
                $order_id = Orders::getOrderID(session_id()) ;
                Orders::updateCustomerId($customer_id, 1,$order_id);
            }
        }
        //Si c'est un admin
        else if (empty($tab_log) && !empty($admin)){
            $_SESSION['admin'] = $log;
            $_SESSION['username'] = $log;
            $_SESSION['customer_id'] = $admin[0]->getId();
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

    public static function readLogin(){
        $view='TestConnexion';
        $page_title='Connexion';
        $controller = "user";

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
        $_SESSION['username'] = "";
        $_SESSION['customer_id'] = "";
        $_SESSION['admin'] = "";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }


    public static function deconnect(){
        $view='deconnexion';
        $page_title='Deconnexion';
        $controller = "user";
        // Suppression des variables de session
        $_SESSION['username'] = "";
        $_SESSION['customer_id'] = "";
        $_SESSION['admin'] = "";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function pswForget(){
        $view='changePsw';
        $page_title='Mot de passe oublié';
        $controller = "user";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function changePsw(){
        $view='changePsw';
        $page_title='Mot de passe oublié';
        $controller = "user";
        if (isset($_POST['login'])){
            $username=$_POST['login'];
            $user=Login::getUsername($username);
            if (!empty($user)){
                if ($_POST['password']==$_POST['psw2']){
                    Login::changePsw(sha1($_POST['psw2']),$username);
                    $log= $_POST['login'];
                    $mdp= $_POST['password'];
                    self::readCustomer();
                }
                else{
                    $erreur="Veuillez rentrer les mêmes mots de passe";
                }
            }
            else{
                $erreur = "Ce login n'existe pas !";
            }
        }
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }


}