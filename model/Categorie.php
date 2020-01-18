<?php

$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Categorie
{
    private $id;
    private $name;
    private $description;
    private $image;

    // Permet de récupérer toute les catégories
    public static function getAllCategories() {
        try {
            $sql = "SELECT * FROM categories ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute();
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
            $tabcategories = $rep->fetchAll();
            return $tabcategories;
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

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public static function addCategorie($name){
        try {
            $sql = 'INSERT INTO categories(`id`, `name`) VALUES (NULL,?)';
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array($name));
        }catch(PDOException $e){
            if (Conf::getDebug()) {
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

}