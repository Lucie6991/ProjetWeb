<?php

require_once 'Connexion.php' ;
class Categorie
{
    private $id;
    private $name;
    private $description;
    private $image;

    public function getToutesLesCategories() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM categories ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabcategories = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabcategories;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}