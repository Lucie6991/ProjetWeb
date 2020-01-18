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

    // Récupère tous les produits
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

    // Récupère le produit à partir de son ID
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

    // Récupère tous les produits d'une cetaine catégorie
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

    // Ajoute un produit
    public static function addProduct($cat,$name,$desc,$img,$price,$qte){
        try {
            $sql = 'INSERT INTO products VALUES (NULL,?,?,?,?,?,?)';
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array($cat,$name,$desc,$img,$price,$qte));
        }catch(PDOException $e){
            if (Conf::getDebug()) {
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    // Met à jour un stock
    public function updateStock($n){
        $id = $this->id;
        try {
            $sql = "UPDATE products SET quantity = ? WHERE id = ? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($n,$id));
        } catch (PDOException $e) {
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