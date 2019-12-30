<?php
// si y'a une erreur ppur le debogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;

session_start();



// on require File pour pouvoir utiliser la fonction BuildPath
require ($ROOT_FOLDER.$DS.'lib'.$DS.'File.php');
$path= File::build_path(array('controller','routeur.php'));
require_once ($path);



