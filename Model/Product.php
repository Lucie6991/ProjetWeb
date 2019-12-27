<?php


class Product
{
    private $id;
    private $cat_id;
    private $name;
    private $description;
    private $image;
    private $price;

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
}