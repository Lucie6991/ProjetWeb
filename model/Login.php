<?php
$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Login
{
    private $login;
    private $mdp;
    private $customerid;
    private $id;

    public function __construct()
    {

    }

    public static function readLogin($log){
        try {
            $sql = "SELECT * FROM logins WHERE username=?  ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Login');
            $tab_log = $rep->fetchAll(PDO::FETCH_ASSOC);
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

    public function getUtilisateurCon ($log, $mdp)
    {
        try {
            $sql = "SELECT c.* FROM logins l, customers c WHERE l.username=? and l.password=? and l.id=c.id";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log, $mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Login');
            $customer = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $customer;
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

    public function getId()
    {
        return $this->id;
    }

    public function getCustomerid()
    {
        return $this->customerid;
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