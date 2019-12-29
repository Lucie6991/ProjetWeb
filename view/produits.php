<?php
include("fonctions.php");
getHeader();
//getAside();

require_once ('../model/Product.php');
//require_once ('../index.php');
//$path= File::build_path(array('index.php'));

//Récupération de l'id de la catégorie cliquée
$id_cat = $_GET['categ'];
//Ne marche pas si on retire cette ligne de code, logique ?
$mesProduitsDeLaCat=Product::getTousLesProduitsDeLaCat($id_cat);

    foreach ($mesProduitsDeLaCat as $ligne) {
        $nom = $ligne['name'];
        $description = $ligne['description'];
        $image = $ligne['image'];
        $prix = $ligne['price'];
        $id = $ligne['id'];
        echo "<br>";
        echo "<img src='images/$image'>";
        echo "<br>";
        echo "$nom <br> $description <br> Notre prix : $prix <br> <a href='choixPanier.php?id=" . $id . "'> Acheter</a> <br>";
    }

getFooter();
?>

