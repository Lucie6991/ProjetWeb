<?php
$path= File::build_path(array('model','Login.php'));
require_once ($path);

class controllerConnexion
{
  /*  public static function readUtilisateur(){
        $controller='connexion';
        $view='TestConnexion';
        $page_title='Connexion';

        if (isset ($_POST['login']) && isset($_POST['mdp'])){
            $unUtilisateur = Model::getUtilisateurCon($_POST['login'], $_POST['mdp']);
        }

        if (empty ($unUtilisateur)){
            $path2 = File::build_path(array('view','error.php'));   //eroor car ca veut dire il n'y a pas de produit
        }
        else{
            $path2 = File::build_path(array('view','view.php'));
        }
        require_once ($path2);
    }*/

    public static function readLogin(){
        $view='TestConnexion';
        $page_title='Connexion';
        $log=$_POST['login'];
        $tab_log = Login::readLogin($log);
        if (empty($tab_log)){
            $path2 = File::build_path(array('view','error.php'));
            require_once ($path2);
        }
        else {
            $path2 = File::build_path(array('view', 'view.php'));
            require_once($path2);
        }
    }

    public static function connect(){
        $view='connexion';
        $page_title='Connexion';
        $path2 = File::build_path(array('view','view.php'));
        require_once ($path2);
    }


}