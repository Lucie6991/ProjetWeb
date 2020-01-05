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
            $sql = "SELECT * FROM orders WHERE status = 2";
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
            //var_dump($tab_order);
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

    public static function createOrder($id_customer, $registered, $session){
        try {
            $sql = "INSERT INTO orders (`customer_id`,`status`,`registered`, `session`) VALUES (?,0,?,?) ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_customer, $registered, $session));
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

    public static function getOrderID($id_customer){
        try {
            $sql = "SELECT id FROM orders WHERE customer_id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_customer));
            $tab_order = $rep->fetchAll();
            $id_order = $tab_order[0]["id"];
            return $id_order;
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

    public static function updateCustomerId($newCID, $orderID){
        try {
            $sql = "UPDATE orders SET customer_id = ? WHERE id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($newCID,$orderID));
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