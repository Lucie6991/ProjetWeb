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

if (!isset($_GET['action'])){
    $action='readCategories';
}else{
    $action =$_GET['action'];
}

if ($action == "addToCart" || $action == "emptyCart" || $action == "seeCart" || $action =="delete"){
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
else if ($action == "readAllOrders" || $action=="addNewCat" || $action=="addNewProduct" || $action=="readOrder" || $action=="confirmOrder" || $action == "seeBill") {
    controllerAdmin::$action();
}
else if ($action == "readAdress"){
    controllerAdress::$action();
}

?>