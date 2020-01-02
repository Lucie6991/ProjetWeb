<?php
$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Customer
{
    private $id;
    private $forname;
    private $surname;
    private $add1;
    private $aad2;
    private $city;
    private $postcode;
    private $phone;
    private $email;
    private $registered;

    public static function getUtilisateurCo($log, $mdp)
    {
        try {
            $sql = "SELECT c.* FROM logins l, customers c WHERE l.username=? and l.password=? and l.customer_id=c.id";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log, $mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Customer');
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

    public static function getCustomerID($fn,$sn,$ad1,$ad2 = NULL,$c, $pc, $p, $e)
    {
        try {
            $sql = "SELECT id FROM customers WHERE forname=? and surname=? and add1=? and add2=? and add3=? and postcode=? and phone=? and email=?";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($fn,$sn,$ad1,$ad2,$c, $pc, $p, $e));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Customer');
            $id = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $id;
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
    public static function addCustomer($fn,$sn,$ad1,$ad2 = NULL,$c, $pc, $p, $e){
        try {
            $sql = 'INSERT INTO customers VALUES (NULL,?,?,?,?,?,?,?,?,1)';
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e));
            $req_prep->setFetchMode(PDO::FETCH_CLASS,'Customer');
            $customer = $req_prep->fetchAll(PDO::FETCH_ASSOC);
            return $customer;
        }catch(PDOException $e){
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

    public static function getCustomer($id_order){
        try {
            $sql = "SELECT c.* FROM customers c, orders o WHERE o.customer_id =c.id AND o.id=?";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($id_order));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Customers');
            $tab_customer = $rep->fetchAll();
            return $tab_customer;
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

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }
}