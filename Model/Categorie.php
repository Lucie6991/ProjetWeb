<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$path= File::build_path(array('model','Connexion.php'));
require_once ($path);
*/
require_once ('Connexion.php');
class Categorie
{
    private $id;
    private $name;
    private $description;
    private $image;

    public static function getToutesLesCategories() {
        try {
            $sql = "SELECT * FROM categories ";
            $rep =Connexion::$cnx->query($sql);
            $rep->execute(array());
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
            $tabcategories = $rep->fetchAll(PDO::FETCH_ASSOC);
            return $tabcategories;
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

    // Les GETTER
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

}