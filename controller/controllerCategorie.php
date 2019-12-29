<?php

require_once ('../model/Categorie.php');
class controllerCategorie
{
    public static function readCategories (){
        $controller='categorie';
        $view='';
        $page_title='Liste des Catégories';
        $lesCategories = Categorie::getToutesLesCategories();
        return $lesCategories;
        require_once ('../view/aside1.inc.php');
        /* $path2= File::build_path(array('view','view.php'));
         require ($path2);*/

    }
}