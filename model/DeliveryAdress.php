<?php

$path= File::build_path(array('model','Model.php'));
require_once ($path);

class DeliveryAdress
{
    private $id;
    private $forename;
    private $surname;
    private $add1;
    private $add2;
    private $add3;
    private $postcode;
    private $phone;
    private $email;

    //Constructeur
    public function __construct($fn = NULL, $ln = NULL, $ad1 = NULL, $ad2 = NULL, $c = NULL, $pc = NULL, $p = NULL, $e = NULL )
    {
        if (!is_null($fn) && !is_null($ln) && !is_null($ad1) && !is_null($c) && !is_null($pc) && !is_null($p) && !is_null($e)) {

            $this->forename = $fn;
            $this->surname = $ln;
            $this->add1 = $ad1;
            $this->add2 = $ad2;
            $this->add3 = $c;
            $this->postcode = $pc;
            $this->phone = $p;
            $this->email = $e;
        }
    }

    //getter général
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public static function getDelivery_adress($id){
        try {
            $sql = "SELECT a.* FROM delivery_addresses a, orders o WHERE a.id = o.delivery_add_id AND o.id =? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'DeliveryAdress');
            $tab_adress = $rep->fetchAll();
            return $tab_adress;
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

    public static function addAdress($fn, $ln, $ad1, $ad2=NULL, $c, $pc, $p, $e){
        try {
            $sql = 'INSERT INTO delivery_addresses(`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email` ) VALUES (NULL,?,?,?,?,?,?,?,?)';
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array($fn, $ln, $ad1, $ad2, $c, $pc, $p, $e));
        }catch(PDOException $e){
            if (Conf::getDebug()) {
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getAdressID($fn,$sn,$ad1,$ad2 = NULL,$c, $pc, $p, $e)
    {
        try {
            $sql = "SELECT id FROM delivery_addresses WHERE firstname=? and lastname=? and add1=? and add2=? and city=? and postcode=? and phone=? and email=?";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($fn,$sn,$ad1,$ad2,$c, $pc, $p, $e));
            $tab = $rep->FetchAll();
            $id = $tab[0]["id"];

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

}