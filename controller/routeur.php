<?php

$path = File::build_path(array('controller','controllerProduct.php'));
require_once ($path);


if (!isset($_GET['action'])){
    $action='readCategories';
}else{
    $action =$_GET['action'];
}

controllerProduct::$action();

?>