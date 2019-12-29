<?php


class File
{
    public static function build_path($path_array) {
        $DS = DIRECTORY_SEPARATOR;
        $ROOT_FOLDER = __DIR__ . $DS . "..";
        return $ROOT_FOLDER. '/' . join('/', $path_array);
    }

    public static function get_error(){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        echo(E_ALL);
    }
}