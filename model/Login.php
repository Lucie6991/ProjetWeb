<?php
$path= File::build_path(array('model','Model.php'));
require_once ($path);
class Login
{
    private $login;
    private $mdp;
    private $customer_id;
    private $id;

    public static function getLoginUser($log, $mdp){
        try {
            $sql = "SELECT * FROM logins WHERE username=? and password=? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log, $mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Login');
            $tab_log = $rep->fetchAll(PDO::FETCH_ASSOC);
            //$tab_log = $rep->fetchAll();
            return $tab_log;
        }
        catch(PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function addLogin($id,$un, $pw){
        try {
            $sql = 'INSERT INTO logins (`customer_id`, `username`, `password`) VALUES (?,?,?)';
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array($id,$un,$pw));
        }
        catch(PDOException $e){
            if (Conf::getDebug()) {
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getCustomerIdOfUser($username){
        try {
            $sql = "SELECT customer_id FROM logins WHERE username=? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($username));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Login');
            $tab = $rep->fetchAll();
            $customerID = $tab[0]->getCustomerid();
            return $customerID;
        }
        catch(PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getUsername($username){
        try {
            $sql = "SELECT * FROM logins WHERE username=? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($username));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Login');
            $tab_username = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tab_username;
        }
        catch(PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getPassword($mdp)
    {
        try {
            $sql = "SELECT * FROM logins WHERE password=? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Login');
            $tab_password = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tab_password;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function getCustomerid()
    {
        return $this->customer_id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

}