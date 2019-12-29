<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$path= File::build_path(array('model','Connexion.php'));
require_once ($path);*/

require_once ('Connexion.php');

class Product
{
    private $id;
    private $cat_id;
    private $name;
    private $description;
    private $image;
    private $price;

    public static function getTousLesProduits() {
        try {
            $sql = "SELECT * FROM products";
            $rep = Connexion::$cnx->query($sql);
            $rep->execute(array());
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $tab_prod = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tab_prod;
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

    public static function getProduit($id_Produit){
        try {
            $sql = "SELECT * FROM products WHERE id=$id_Produit";
            $rep = Connexion::$cnx->query($sql);
            $rep->execute(array($id_Produit));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Produit');
            $tabProduit = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tabProduit;
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

    public static function getTousLesProduitsDeLaCat($id_Cat)
    {
        try {
            $sql = "SELECT * FROM products WHERE cat_id =$id_Cat";
            $rep =Connexion::$cnx->query($sql);
            $rep->execute(array());
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Produit');
            $tabProduitCat = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tabProduitCat;
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

    // Les GETTER
    public function getId(){
        return $this->id;
    }

    public function getCatId(){
        return $this->cat_id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public function getPrice(){
        return $this->price;
    }
}