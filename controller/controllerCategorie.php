<?php


class controllerCategorie
{

    // Lecture de toutes les catégories
    public static function readCategories (){
        $controller = "user";
        $view='home';
        $page_title='Liste des Catégories';
        $message = "";
        $lesCategories = Categorie::getAllCategories();
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);

    }

    public static function addedCat(){
        if (isset($_POST["nom"])){
            $name =$_POST["nom"];
            Categorie::addCategorie($name);
        }
        $view='addedCat';
        $controller="admin";
        $page_title='Catégorie ajoutée';
        $message = "";
        $path2 = File::build_path(array('view',$controller,'viewAdmin.php'));
        require ($path2);
    }

}