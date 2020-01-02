<?php

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

    public static function addLogin($id, $un, $pw){
        try {
            $sql = 'INSERT INTO logins VALUES (NULL,?,?,?)';
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