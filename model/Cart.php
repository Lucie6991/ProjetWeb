<?php


class Cart
{

    private $nbArticles;
    private $price;

    public function __construct()
    {
        //if (!isset($_SESSION)) {
         //   session_start();
       // }
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $nbArticle = 0;
        $price = 0;

    }

    public static function addToCart($id, $quantity){
        array_push($_SESSION['cart'], array($id, $quantity) );
        $tab_prod = Product::getProduit($id);
    }

    public function emptyCart(){
        echo'toto';
        $_SESSION['cart']= array();
    }

    public function addPrice($price2){
        $this->price += $price2;
    }

    public function addArticles($nb){
        $this->nbArticles += $nb;
    }

    /// Les getters
    public function getNbArticles()
    {
        return $this->nbArticles;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getCart(){
        return  $_SESSION['cart'];
    }
}