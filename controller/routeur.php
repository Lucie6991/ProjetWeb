<?php

$path = File::build_path(array('controller','controllerProduct.php'));
require_once ($path);
$path2 = File::build_path(array('controller','controllerCart.php'));
require_once ($path2);


if (!isset($_GET['action'])){
    $action='readCategories';
}else{
    $action =$_GET['action'];
}

if ($action == "addToCart" || $action == "emptyCart" || $action == "seeCart" ){
    controllerCart::$action();
}
else if ($action== 'readAllProducts' || $action == 'readProductsCat' || $action == 'read' || $action == 'readCategories'  ){
    controllerProduct::$action();
}

else if ($action == 'getUtilisateurCon'){
    controllerConnexion::$action();
}

?>