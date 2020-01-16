<?php
$path= File::build_path(array('model','Customer.php'));
require_once ($path);
$path3= File::build_path(array('model','DeliveryAdress.php'));
require_once ($path3);
$path4= File::build_path(array('model','Orders.php'));
require_once ($path4);

class controllerAdress
{
    public static function readAdress(){
        $view='adress';
        $page_title='Adresse';
        $controller = "user";;
        $tab_adress = Customer::getAdress($_SESSION['customer_id']);
        $id_order = Orders::getOrderID($_SESSION['customer_id']);
        $order = Orders::getOrder($id_order);
        if (isset($_POST["total"])){
            $total = $_POST["total"];
            $order[0]->updateTotal($total);
        }
        $path2 = File::build_path(array('view',$controller,'view.php'));

        if (empty($tab_adress) && empty($_SESSION['username'])){
            $view='FormAdress';
            $path2 = File::build_path(array('view',$controller,'view.php'));
        }
        require_once ($path2);
    }

    public static function newAdressFact(){
        $view='FormAdress';
        $page_title='Ajout d\'une nouvelle adresse';
        $controller = "user";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function sameAdd(){
        $controller = "user";
        $view='payment';
        $page_title='Payement';
        $tab_adress = Customer::getAdress($_SESSION['customer_id']);

        foreach ($tab_adress as $ligne) {
            $prenom = $ligne->get('forname');
            $nom = $ligne->get('surname');
            $add1 = $ligne->get('add1');
            $add2 = $ligne->get('add2');
            $city = $ligne->get('add3');

            $postcode = $ligne->get('postcode');
            $phone = $ligne->get('phone');
            $email = $ligne->get('email');
        }
        DeliveryAdress::addAdress($prenom, $nom, $add1, $add2, $city, $postcode, $phone, $email);
        $id=DeliveryAdress::getAdressID($prenom, $nom, $add1, $add2, $city, $postcode, $phone, $email);
        Orders::updateDeliveryAdId($_SESSION['customer_id'], $id);
        $id_order = Orders::getOrderID($_SESSION['customer_id']);
        Orders::updateStatus(1,$id_order);

        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function addLivDiff()
    {
        $view = 'payment';
        $page_title = 'Payement';
        $controller = "user";

        $fn = $_POST["firstname"];
        $sn = $_POST["lastname"];
        $ad1 = $_POST["add1"];
        $ad2 = $_POST["add2"];
        $c = $_POST["city"];
        $pc = $_POST["postcode"];
        $p = $_POST["phone"];
        $e = $_POST["email"];

        DeliveryAdress::addAdress($fn, $sn, $ad1, $ad2, $c, $pc, $p, $e);
        Customer::addCustomer($fn,$sn,$ad1,$ad2,$c,$pc,$p,$e,0);
        $id_c = Customer::getCustomerID($fn, $sn, $ad1, $ad2, $c, $pc, $p, $e);
        $id=DeliveryAdress::getAdressID($fn, $sn, $ad1, $ad2, $c, $pc, $p, $e);

        Orders::updateDeliveryAdId($_SESSION['customer_id'], $id);
        $id_order = Orders::getOrderID($_SESSION['customer_id']);
        Orders::updateStatus(1,$id_order);
        Orders::updateCustomerId($id_c, 0, $id_order);

        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

    public static function addAdrFact(){
        $view = 'adress';
        $page_title = 'Adresse';
        $controller = "user";

        $fn = $_POST["firstname"];
        $sn = $_POST["lastname"];
        $ad1 = $_POST["add1"];
        $ad2 = $_POST["add2"];
        $c = $_POST["city"];
        $pc = $_POST["postcode"];
        $p = $_POST["phone"];
        $e = $_POST["email"];

        Customer::updateAdrCustomer($_SESSION['customer_id'], $fn, $sn, $ad1, $ad2, $c, $pc, $p,$e);
        $tab_adress = Customer::getAdress($_SESSION['customer_id']);

        $path2 = File::build_path(array('view',$controller,'view.php'));
        require_once ($path2);
    }

}