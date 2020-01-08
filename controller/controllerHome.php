<?php


class controllerHome
{

    public static function contact(){
        $view = "contact";
        $controller = "user";
        $page_title = "Nous contacter";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    public static function recrut(){
        $view = "recrut";
        $controller = "user";
        $page_title = "Nous rejoindre";
        $path2 = File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }
}