<?php

$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Product
{
    private $id;
    private $cat_id;
    private $name;
    private $description;
    private $image;
    private $price;
    private $quantity;

    public static function getAllProducts() {
        try {
            $sql = "SELECT * FROM products";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute();
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $tab_prod = $rep->fetchAll();
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
            $sql = "SELECT * FROM products WHERE id= ? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($id_Produit));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Product');
            $tabProduit = $rep->fetchAll();
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

    public static function getAllProductsCat($id_Cat)
    {
        try {
            $sql = "SELECT * FROM products WHERE cat_id =?";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_Cat));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $tabProduitCat = $rep->fetchAll();
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

    public function getQuantity(){
        return $this->quantity;
    }
}