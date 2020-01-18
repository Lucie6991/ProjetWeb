<?php
$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Admin
{
    private $id;
    private $username;
    private $password;

    // Permet de récupérer l'admin en connaissant son login et son mot de passe
    public static function getAdmin($log, $mdp){
        try {
            $sql = "SELECT * FROM admin WHERE username=? and password=? ";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log, $mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Admin');
            $tab_admin = $rep->fetchAll();
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

    // Permet d'ajouter un nouvel administrateur
    public static function addAdmin($un, $pw){
        try {
            $sql = 'INSERT INTO admin ( `username`, `password`) VALUES (?,?)';
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute(array($un,$pw));
        }
        catch(PDOException $e){
            if (Conf::getDebug()) {
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
}