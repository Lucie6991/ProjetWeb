<?php

$path = File::build_path(array('controller','controllerProduct.php'));
require_once ($path);
$path2 = File::build_path(array('controller','controllerCart.php'));
require_once ($path2);
$path3 = File::build_path(array('controller','controllerConnexion.php'));
require_once ($path3);
$path4 = File::build_path(array('controller','controllerAdmin.php'));
require_once ($path4);
$path5 = File::build_path(array('controller','controllerCategorie.php'));
require_once ($path5);
$path6 = File::build_path(array('controller','controllerAdress.php'));
require_once ($path6);
$path7 = File::build_path(array('controller','controllerHome.php'));
require_once ($path7);

if (!isset($_GET['action'])){
    $action='readCategories';
}else{
    $action =$_GET['action'];
}

if ($action == "addToCart" || $action == "emptyCart" || $action == "seeCart" || $action =="delete" || $action=="toPay"){
    controllerCart::$action();
}
else if ($action== 'readAllProducts' || $action == 'readProductsCat' || $action == 'read' ||$action=="addedProd" ){
    controllerProduct::$action();
}
else if ( $action == 'readCategories' ||$action=="addedCat" ){
    controllerCategorie::$action();
}
else if ($action == 'readCustomer' || $action == "connect" || $action=='readLogin' || $action=='addedCustomer' || $action=='add' || $action=='deconnect'){
    controllerConnexion::$action();
}
else if ($action == "readAllOrders" || $action=="addNewCat" || $action=="addNewProduct" || $action=="readOrder" || $action=="confirmOrder"
    || $action == "seeBill" || $action == "seeOrdersByChecks" || $action =="validateCheck" || $action == "addStock" || $action=="updateStock") {
    controllerAdmin::$action();
}
else if ($action == "readAdress" || $action == "newAdressFact" || $action == "sameAdd" || $action == "addLivDiff" || $action == "addAdrFact"){
    controllerAdress::$action();
}
else if($action == "recrut" || $action == "contact" ){
    controllerHome::$action();
}
else{
    controllerCart::readCategories();
}

?>