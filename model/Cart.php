<?php


class Cart
{

    // Permet d'ajouter au panier un produit avec une certaine quantité
    public static function addToCart($order_id,$id, $quantity){
        try {
            $sql = "INSERT INTO orderitems VALUES (NULL,?,?,?) ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($order_id,$id,$quantity));
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

    // Permet de vider les produits qui'il y a dans le panier
    public static function emptyCart($orderID){
        try {
            $sql = "DELETE FROM orderitems WHERE order_id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($orderID));
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

    // Permet d'enlever un produit du panier
    public static function delete($orderID,$product){
        try {
            $sql = "DELETE FROM orderitems WHERE order_id = ? AND id =? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($orderID, $product));
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

    // Permet de recupérer les produits d'une commande
    public static function getProducts($orderID){
        try {
            $sql = "SELECT p.* , o.quantity 'qte' , o.id 'order' FROM products p, orderitems o, orders ord WHERE o.order_id = ? AND p.id =o.product_id AND o.order_id = ord.id AND ord.status = 0";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($orderID));
            $tabCart = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tabCart;
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


    public static function getProductsStock($orderID){
        try {
            $sql = "SELECT p.* , o.quantity 'qte' , o.id 'order' FROM products p, orderitems o, orders ord WHERE o.order_id = ? AND p.id =o.product_id AND o.order_id = ord.id AND ord.status = 1";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($orderID));
            $tabCart = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tabCart;
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