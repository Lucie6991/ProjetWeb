<?php


class Review
{
    private $id_product;
    private $name_user;
    private $photo_user;
    private $stars;
    private $title;
    private $description;

    public static function getReviewProduct($id){
        try {
            $sql = "SELECT * FROM reviews WHERE id_product = ? ";
            $rep =Model::$pdo->prepare($sql);
            $rep->execute(array($id));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Review');
            $tabReview = $rep->fetchAll();
            return $tabReview;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getIdProduct()
    {
        return $this->id_product;
    }

    public function getNameUser()
    {
        return $this->name_user;
    }

    public function getPhotoUser()
    {
        return $this->photo_user;
    }

    public function getStars()
    {
        return $this->stars;
    }

    public function getTitle()
    {
        return $this->title;
    }
}