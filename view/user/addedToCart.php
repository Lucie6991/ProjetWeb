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
<h3> Nos clients ont aussi consulté : </h3>
<div class="row">
    <div class="col-lg-1"></div>
    <?php
    $tab_product = Product::getAllProducts();
    for ($i=1;$i<4;$i++) {
        if($id+$i >= count($tab_product) ){
            $image= $tab_product[$id+$i-14]->getImage();
            $id_prod = $id+$i-10;
        }
        else{
            $image= $tab_product[$id+$i-4]->getImage();
            $id_prod = $id+$i;
        }
        echo "<div class='col-lg-3'>";
        echo "<a href='?action=read&id=".$id_prod."'><img class ='image_produit_consult'  src='view/images/$image' > </a>";
        echo "</div>";
    }
    ?>
</div>

