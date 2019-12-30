<?php
/*$path= File::build_path(array('config','Conf.php'));
require_once ($path);*/

require_once ('../config/Conf.php');

class Connexion
{
    public static $cnx;

    public static function getConnexion() {
        $dbhost = Conf::getHostname();
        $dbbase = Conf::getDatabase();
        $dbuser = Conf::getUser();
        $dbpwd = Conf::getPassword();

        try {

            self::$cnx = new PDO("mysql:host=$dbhost;dbname=$dbbase", $dbuser, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // self::$cnx->exec('SET CHARACTER SET utf8');

        } catch(PDOException $e){
            if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function deConnexion() {
        try {
            $cnx = null;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
Connexion::getConnexion();
