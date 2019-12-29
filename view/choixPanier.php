<?php
include("fonctions.php");
getHeader();
require_once ('../model/Product.php');

//Récupération de l'id de la vue produits.php
$id_product = $_GET['id'];
//Ligne de code bizarre ??
$monProduit=Product::getProduit($id_product);

foreach ($monProduit as $ligne) {
    $nom = $ligne['name'];
    echo "<h2 class ='nom_produit'> $nom </h2>";
    $description = $ligne['description'];
    $image = $ligne['image'];
    $prix = $ligne['price'];
    $id = $ligne['id'];
}
    echo "<img class ='image_produit' src='images/$image'>";
    echo "<h3> C'est un très bon choix ! </h3>";


getFooter();