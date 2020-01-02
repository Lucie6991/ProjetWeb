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
            $sql = "SELECT i.* FROM orders o, order_items i WHERE o.id = i.order_id AND o.id = ?";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($id));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Cart');
            $tab_items = $rep->fetchAll();
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

    public function getPaymentType()
    {
        return $this->payment_type;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getId()
    {
        return $this->id;
    }
}