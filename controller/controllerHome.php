<?php


class controllerHome
{
    // Redirection vers la Page Qui sommes Nous ?
    public static function us(){
        $view = "aboutUs";
        $controller = "user";
        $page_title = "Qui sommes-nous";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    // Redirection vers la Page de contact
    public static function contact(){
        $view = "contact";
        $controller = "user";
        $page_title = "Nous contacter";
        if (isset($_POST["message"])){
            $retour="Votre message a bien été envoyé !";
            $mail = mail('agathe.thevenin@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From : hortfyi.com');
        }
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    // Redirection vers la Page de recrutement
    public static function recrut(){
        $view = "recrut";
        $controller = "user";
        $page_title = "Nous rejoindre";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

}