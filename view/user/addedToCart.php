<?php

foreach ($tab_product as $ligne){
    $nom = $ligne->getName();
    $description = $ligne->getDescription();
    $image = $ligne->getImage();
    $prix = $ligne->getPrice();
    $prixHT = $prix/1.2;
    $id = $ligne->getId();
    $catID = $ligne->getCatId();
    $quantity = $ligne->getQuantity();
}
?>
<h3>Le produit a bien été ajouté au panier ! </h3>
<div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-4'>
                <?php echo "<img class ='image_produit' src='view/images/$image'>"; ?>
            </div>
            <span class ='col-lg-5'>
                <?php echo "<h4><br><br><br> &nbsp $nom</h4>";?>
            </span>
                    <div class="textePanier">
            <span class ='col-lg-3'>
                <?php echo "<p><br><br><br><strong> $prix € TTC </strong><br> (".number_format($prixHT,2) ."€ HT )</p>"; ?>
            </span>
                    </div>
        </span>
</div>
<br>
<span class="bouton">
    <a class="btn btn-success" href="javascript:history.go(-2)"><span class='glyphicon glyphicon-check'></span>  Continuer mes achats</a>
</span>
<span class="bouton">
    <a class="btn btn-info" href="?action=seeCart"> <span class='glyphicon glyphicon-shopping-cart'></span>  Voir mon panier</a>
</span>
<span class="bouton">
    <a class="btn btn-warning" href='?action=emptyCart'> <span class='glyphicon glyphicon-trash'></span>  Vider Panier</a>
</span>
<br>

<?php
/*
echo "<h3> Nos clients ont aussi consulté : </h3>";
$tab_product_cat = Product::getAllProductsCat($catID);
foreach ($tab_product_cat as $prod){
    $image = $prod->getImage();
    echo "<a><img class ='image_produit' href='#' src='view/images/$image' > </a>";
}
*/
?>

