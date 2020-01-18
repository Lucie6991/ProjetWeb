<?php


class controllerCategorie
{

    // Lecture de toutes les catégories
    public static function readCategories (){
        $controller = "user";
        $view='home';
        $page_title='Accueil';
        $tab_product = Product::getProduit(rand(4,29));
        $lesCategories = Categorie::getAllCategories();
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);

    }

    // Ajout d'une catégorie par un administrateur
    public static function addedCat(){
        if (isset($_POST["nom"])){
            $name =$_POST["nom"];
            Categorie::addCategorie($name);
        }
        $view='formAddCat';
        $message = "La catégorie a été ajoutée avec succès !";
        $controller="admin";
        $page_title='Catégorie ajoutée';
        $path2 = File::build_path(array('view',$controller,'viewAdmin.php'));
        require ($path2);
    }

}