<?php


class Cart
{
    
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


    public static function getProducts($orderID){
        try {
            $sql = "SELECT p.* , o.quantity 'qte' , o.id 'order' FROM products p, orderitems o WHERE o.order_id = ? AND p.id =o.product_id";
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

    public static function deleteOrderItem($id_order){
        $sql = "DELETE FROM orderitems WHERE order_id = ? ";
        $rep =Model::$pdo->prepare($sql);
        $rep->execute(array($id_order));
    }

}