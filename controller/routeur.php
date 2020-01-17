<?php

$path = File::build_path(array('view',"utilitaire",'includeControllers.inc.php'));
require_once ($path);

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
else if ($action == 'readCustomer' || $action == "connect" || $action=='readLogin'  || $action=='deconnect' || $action=='pswForget' || $action=='changePsw'){
    controllerConnexion::$action();
}
else if ($action == "readAllOrders" || $action=="addNewCat" || $action=="addNewProduct" || $action=="readOrder" || $action=="confirmOrder"
    || $action == "seeBill" || $action == "seeOrdersByChecks" || $action =="validateCheck" || $action == "addStock" || $action=="updateStock"
    || $action == "addAdmin" || $action == "addedAdmin") {
    controllerAdmin::$action();
}
else if ($action == "readAdress" || $action == "newAdressFact" || $action == "sameAdd" || $action == "addLivDiff" || $action == "addAdrFact"){
    controllerAdress::$action();
}
else if($action == "recrut" || $action == "contact" || $action=="us" ){
    controllerHome::$action();
}
else if ($action == "myAccount" || $action=="addedCustomer" || $action=="add"){
    controllerCustomer::$action();
}
else{
    controllerCategorie::readCategories();
}

?>