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

    // Récupère toutes les commandes payées
    public static function getAllOrders(){
        try {
            $sql = "SELECT * FROM orders WHERE status = 3";
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

    // Récupère les produits d'une commande
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

    // Récupère la commande à partir de son ID
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

    // Récupère La commande d'un client avec un certain statut
    public static function getOrderByCustomer($id_customer, $status){
        try {
            $sql = "SELECT * FROM orders WHERE customer_id = ? AND status = ?";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_customer, $status));
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

    // Verifie si une commande avec status 0 existe ou pas
    public static function existsOrder($id_customer){
        try {
            $sql = "SELECT * FROM orders WHERE customer_id = ? AND status=0";
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

    // Création d'une commande
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

    // Récupère Id de la commande d'un client avec un certain statut
    public static function getOrderID($id_customer, $status = 0){
        try {
            $sql = "SELECT id FROM orders WHERE customer_id = ? AND status = ?";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id_customer,$status));
            $tab_order = $rep->fetchAll();
            // si aucune commande n'est créée avant de voir le panier : cela evite une erreur
            if (!empty($tab_order)){
                $id_order = $tab_order[0]["id"];
                return $id_order;
            }
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

    // Met à jour la commande avec le bon client
    public static function updateCustomerId($newCID, $r, $orderID){
        try {
            $sql = "UPDATE orders SET customer_id = ?, registered= ? WHERE id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($newCID, $r ,$orderID));
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

    // Met à jour l'adresse
    public static function updateDeliveryAdId($customer_id, $delivery_Ad_id){
        try {
            $sql = "UPDATE orders SET delivery_add_id = ? WHERE customer_id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($delivery_Ad_id, $customer_id));
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

    // Récupère les commandes payées par chèque pas validées
    public static function getAllOrdersPaidByCheck(){
        try {
            $sql = "SELECT * FROM orders WHERE payment_type = 'cheque' AND status = 2";
            $rep =Model::$pdo->prepare($sql);
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

    // Met à jour le statut d'une commande
    public static function updateStatus($status, $id_order){
        try {
            $sql = "UPDATE orders SET status = ? WHERE id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($status, $id_order));
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

    // Met à jour le total de la commande
    public function updateTotal($total){
        try {
            $sql = "UPDATE orders SET total = ? WHERE id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($total, $this->get('id')));
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

    // getter
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Mise a jour finale avec le type de paiement la date et le statut
    public function lastUpdate($date, $type, $status){
        try {
            $sql = "UPDATE orders SET date= ?, payment_type=?, status = ? WHERE id = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($date,$type, $status, $this->get('id')));
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