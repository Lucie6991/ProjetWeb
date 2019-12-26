<?php

require_once 'Connexion.php' ;
class DialogueBD
{
    public function getTousLesProduits() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM products ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabproducts = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabproducts;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

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

    public function getTousLesProduitsDeLaCat($idCat) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM products WHERE cat_id = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idCat));
            $tabproducts = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabproducts;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getProduit($idProduit) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM products WHERE id = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idProduit));
            $tabproduit = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabproduit;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
