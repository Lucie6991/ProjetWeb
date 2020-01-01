<?php


class Cart
{

    private $nbArticles;
    private $price;

    /*
    public function __construct()
    {
        //if (!isset($_SESSION)) {
         //   session_start();
       // }
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $nbArticle = 0;
        $price = 0;

    }
    */

    public static function addToCart($id, $quantity){
        try {
            $sql = "INSERT INTO orderitems VALUES (NULL,?,?,?) ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array(1,$id,$quantity));
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

    public static function emptyCart(){
        try {
            $sql = "DELETE FROM orderitems WHERE order_id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array(1));
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

    public function addPrice($price2){
        $this->price += $price2;
    }

    public function addArticles($nb){
        $this->nbArticles += $nb;
    }

    public static function delete($order){
        try {
            $sql = "DELETE FROM orderitems WHERE order_id = ? AND id =? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array(1, $order));
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

    /// Les getters
    public function getNbArticles()
    {
        return $this->nbArticles;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getCart(){
        try {
            $sql = "SELECT * FROM orderitems WHERE order_id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array(1));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Cart');
            $tabCart = $rep->fetchAll();
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

    public static function getProducts(){
        try {
            $sql = "SELECT p.* , o.quantity 'qte' , o.id 'order' FROM products p, orderitems o WHERE o.order_id = ? AND p.id =o.product_id";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array(1));
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