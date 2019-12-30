<?php


class Conf
{
    static private $debug = True;
    static private $databases = array(
        'dbhost' => '127.0.0.1',
        'dbbase' => 'hortfyi_web4shop',
        'dbuser' => 'hortfyi_usersio',
        'dbpwd' => 'userepul69'
        /*
        'dbhost' => 'localhost',
        'dbbase' => 'hortfyi_web4shop',
        'dbuser' => 'usersio',
        'dbpwd' => 'sio'
        */



    );

    static public function getUser() {
        return self::$databases['dbuser'];
    }
    static public function getDatabase() {
        return self::$databases['dbbase'];
    }
    static public function getPassword() {
        return self::$databases['dbpwd'];
    }
    static public function getHostname() {
        return self::$databases['dbhost'];
    }


    static public function getDebug() {
        return self::$debug;
    }

}
?>