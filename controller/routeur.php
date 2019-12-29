<?php

/*$path = File::build_path(array('controller','controllerProduct.php'));
require_once ($path);
*/

require_once ('../controller/controllerProduct.php');
if (!isset($_GET['action'])){
    $action='read';
}else{
    $action =$_GET['action'];
}

controllerProduct::$action();

?>