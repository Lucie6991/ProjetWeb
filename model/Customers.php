<?php
$path= File::build_path(array('model','Model.php'));
require_once ($path);

class Customers
{
    private $forname;
    private $surname;

    public function __construct()
    {
        if (!isset($_SESSION['customer'])){
            $_SESSION['customer'] = array();
        }
    }

    public function getUtilisateurCon ($log, $mdp)
    {
        try {
            $sql = "SELECT c.* FROM logins l, customers c WHERE l.username=? and l.password=? and l.id=c.id";
            $rep = Model::$pdo->prepare($sql);
            $rep->execute(array($log, $mdp));
            $rep->setFetchMode(PDO::FETCH_CLASS,'Customers');
            $_SESSION['customer'] = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $_SESSION['customer'];
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

    public function getForname()
    {
        return $this->forname;
    }

    public function getSurname()
    {
        return $this->surname;
    }
}