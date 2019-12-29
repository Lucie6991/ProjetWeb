<?php
require_once('../model/Product.php');

$tab_prod = Product::getTousLesProduits();

foreach ($tab_prod as $obj){
    echo $obj->getName();
    echo "<br>";
}