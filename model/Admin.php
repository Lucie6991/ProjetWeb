<?php
$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Admin
{
    private $id;
    private $username;
    private $password;

    public static function getAdmin($log, $mdp){
        try {
            $sql = "SELECT * FROM admin WHERE username=? and password=? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log, $mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Admin');
            $tab_admin = $rep->fetchAll(PDO::FETCH_ASSOC);
            //$tab_log = $rep->fetchAll();
            return $tab_admin;
        }
        catch(PDOException $e){
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}