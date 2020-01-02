<?php

$path= File::build_path(array('model','Model.php'));
require_once ($path);

class DeliveryAdress
{
    private $id;
    private $firstname;
    private $lastname;
    private $add1;
    private $add2;
    private $city;
    private $postcode;
    private $phone;
    private $email;

    //Constructeur
    public function __construct($fn = NULL, $ln = NULL, $ad1 = NULL, $ad2 = NULL, $c = NULL, $pc = NULL, $p = NULL, $e = NULL )
    {
        if (!is_null($fn) && !is_null($ln) && !is_null($ad1) && !is_null($c) && !is_null($pc) && !is_null($p) && !is_null($e)) {

            $this->firstname = $fn;
            $this->lastname = $ln;
            $this->add1 = $ad1;
            $this->add2 = $ad2;
            $this->city = $c;
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
            $rep->setFetchMode(PDO::FETCH_CLASS, 'DeliveryAddress');
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
}