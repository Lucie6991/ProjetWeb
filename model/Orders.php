<?php


class Orders
{
    private $id;
    private $customer_id;
    private $registered;
    private $delivery_add_id;
    private $payment_type;
    private $date;
    private $status;
    private $session;
    private $total;

    public static function getAllOrders(){
        try {
            $sql = "SELECT * FROM orders";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute();
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Orders');
            $tab_order = $rep->fetchAll();
            return $tab_order;
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

    public static function getOrderItems($id){
        try {
            $sql = "SELECT p.* , o.quantity 'qte' , o.id 'order' FROM products p, orderitems o WHERE o.order_id = ? AND p.id =o.product_id";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id));
            $tab_items = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tab_items;
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

    public static function getOrder($id_order){
        try {
            $sql = "SELECT * FROM orders WHERE id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_order));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Orders');
            $tab_order = $rep->fetchAll();
            return $tab_order;
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

    public static function deleteOrder($id_order){
        $sql = "DELETE FROM orders WHERE id = ? ";
        $rep =Model::$pdo->prepare($sql);
        $rep->execute(array($id_order));
    }


    public static function existsOrder($id_customer){
        try {
            $sql = "SELECT * FROM orders WHERE customer_id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_customer));
            $tab_order = $rep->fetchAll();
            if (empty($tab_order)){
                return false;
            }
            else
                return true;
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

    public static function createOrder($id_customer){
        try {
            $sql = "INSERT INTO orders (`customer_id`,`status`) VALUES (?,0) ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_customer));
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

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }
}