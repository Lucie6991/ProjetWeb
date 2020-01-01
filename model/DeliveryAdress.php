<?php

$path= File::build_path(array('model','Model.php'));
require_once ($path);

class DeliveryAdress
{
    private $id;
    private $firstname;
    private $lastname;
    private $add1;
    private $add2;
    private $city;
    private $postcode;
    private $phone;
    private $email;

    //Constructeur
    public function __construct($fn = NULL, $ln = NULL, $ad1 = NULL, $ad2 = NULL, $c = NULL, $pc = NULL, $p = NULL, $e = NULL )
    {
        if (!is_null($fn) && !is_null($ln) && !is_null($ad1) && !is_null($c) && !is_null($pc) && !is_null($p) && !is_null($e)) {

            $this->firstname = $fn;
            $this->lastname = $ln;
            $this->add1 = $ad1;
            $this->add2 = $ad2;
            $this->city = $c;
            $this->postcode = $pc;
            $this->phone = $p;
            $this->email = $e;
        }
    }
}