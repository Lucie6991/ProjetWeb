<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
//var_dump($ROOT_FOLDER);

require ("..".$DS.'lib'.$DS.'File.php');
$path= File::build_path(array('controller','routeur.php'));
require_once ($path);

//require_once ('../controller/routeur.php');