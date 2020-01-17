<h3> Votre commande a bien été enregistré </h3>
<p> La livraison est de 3 à 5 jours. Nous mettons tout en oeuvre afin d'envoyer votre commande le plus rapidement !</p>
<h4>Total du panier : </h4>
<?php

$totalprice =0;
$totalpriceHT =0;

foreach ( $tab_order as $ligne) {
    $id= $ligne->get('id');
    $price = $ligne->get('total');
    $priceHT =$price/1.2;
}
?>
<div class="tabCart">
        <?php $price = number_format($price,2);
        $priceHT = number_format($priceHT,2);
        echo "<h4> <span class='titlePrice'> Total : </span><span class='priceTTC'> $price € TTC <span class='priceHT'> ( $priceHT € HT )</span></span></h4>";
        ?>
</div>

<h4> Les produits de la commande :</h4>
<div class ='row'>
    <div class ='col-lg-2'>
    </div>
    <div class="textePanier">
        <span class ='col-lg-4'>
            <h3> ARTICLE </h3>
        </span>
    </div>
    <div class ='col-lg-3'>
        <h3> QUANTITE </h3>
    </div>
    <div class ='col-lg-3'>
        <h3> PRIX </h3>
    </div>
</div>

<?php


foreach ($tab_order_item as $ligne):
    $id= $ligne['id'];
    $quantiteCommande = $ligne['qte'];
    $name = $ligne['name'];
    $price = $ligne['price'];
    $order=$ligne['order'];
    $image = $ligne['image'];
    ?>
    <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-3'>
                <?php echo "<img class ='image_produit' src='view/images/$image'>"; ?>
            </div>
            <span class ='col-lg-4'>
                <?php echo "<h4><br><br> $name</h4>";?>
            </span>
            <span class ='col-lg-2'>
                <?php echo "<h4><br><br> &nbsp $quantiteCommande</h4>";?>
            </span>
                    <div class="textePanier">
            <span class ='col-lg-2'>
                <?php echo "<p><br><br><strong> $price € TTC </strong><br> (".number_format($price/1.2,2) ."€ HT )</p>"; ?>
            </span>
                    </div>
        </span>
    </div>
    <br>
    <?php
endforeach ?>
