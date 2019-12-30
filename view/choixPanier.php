<?php

//require_once('../model/Product.php');

//Récupération de l'id de la vue produits.php
//$id_product = $_GET['id'];
//Ligne de code bizarre ??
//$monProduit=Product::getProduit($id_product);

foreach ($tab_product as $ligne) {
    $nom = $ligne->getName();
    echo "<h2 class ='nom_produit'> $nom </h2>";
    $description = $ligne->getDescription();
    $image = $ligne->getImage();
    $prix = $ligne->getPrice();
    $id = $ligne->getId();
    $quantity = $ligne->getQuantity();
}

    echo "<img class ='image_produit' src='view/images/$image'>";
if ($quantity ==0){
    echo "<h3 class='ProdRupture'>  Produit en rupture de stock </h3>";
}
else if ($quantity >3){
    echo "<h3> C'est un très bon choix ! </h3>";}
else{
    echo "<h3 class='ProdLimite'> Les quantités de ce produits sont limitées... </h3>";
    //echo '<div class="alert alert-primary">';
    //echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    //echo '<p class="alert alert-primary" role="alert ">Les quantités de ce produits sont limitées... </p>';
    //echo '</div>';
}
//echo "<button class='btn btn-warning' href='?action=addToCart&id=".$id."'> <span class='glyphicon glyphicon-shopping-cart'></span>Ajouter au panier</button>";
echo "<a href='?action=addToCart&id=".$id."&q=1' class='btn btn-warning'> Ajouter au panier</a>"
?>