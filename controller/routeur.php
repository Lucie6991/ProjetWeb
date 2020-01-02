<?php

$path = File::build_path(array('controller','controllerProduct.php'));
require_once ($path);
$path2 = File::build_path(array('controller','controllerCart.php'));
require_once ($path2);
$path3 = File::build_path(array('controller','controllerConnexion.php'));
require_once ($path3);


if (!isset($_GET['action'])){
    $action='readCategories';
}else{
    $action =$_GET['action'];
}

if ($action == "addToCart" || $action == "emptyCart" || $action == "seeCart" || $action =="delete"){
    controllerCart::$action();
}
else if ($action== 'readAllProducts' || $action == 'readProductsCat' || $action == 'read' || $action == 'readCategories'  ){
    controllerProduct::$action();
}

else if ($action == 'getUtilisateurCon' || $action == "connect" || $action=='readLogin'){
    controllerConnexion::$action();
}


?>