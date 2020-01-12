<?php
if (!isset($code)) { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p> En ce moment profitez de la livraison gratuite à partir de 40€ d'achat avec le code promo <strong>LivraisonFree</strong>
            !!</p>
    </div>
    <?php
}
$deliveryPrice =6.5;
if (empty($tab_cart)){
    echo "<h3> Votre panier est vide</h3>";
}
else{
    ?>
    <div class ='row'>
        <div class ='col-lg-1'>
        </div>
        <div class="textePanier">
        <span class ='col-lg-5'>
            <h3> ARTICLE </h3>
        </span>
        </div>
        <div class ='col-lg-2'>
            <h3> QUANTITE </h3>
        </div>
        <div class="textePanier">
        <span class ='col-lg-3'>
            <h3> PRIX </h3>
        </span>
        </div>
    </div>

    <?php
    $totalprice =0;
    $totalpriceHT =0;
    foreach ( $tab_cart as $ligne) :
        $id= $ligne['id'];
        $quantiteCommande = $ligne['qte'];
        $name = $ligne['name'];
        $price = $ligne['price'];
        $priceHT =$price/1.2;
        $order=$ligne['order'];
        $image = $ligne['image'];
        $totalprice+=($price*$quantiteCommande);
        $totalpriceHT+=($priceHT*$quantiteCommande);
        ?>
        <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-2'>
                <?php echo "<a href='?action=read&id=".$id."'><img class ='panier' src='view/images/$image'></a>"; ?>
            </div>
            <span class ='col-lg-4'>
                <?php echo "<h4><br><br> &nbsp $name</h4>";?>
            </span>
                <div class="textePanier">
            <span class ='col-lg-2'>
                <?php echo "<p><br><br><strong> $quantiteCommande </strong></p>"; ?>
            </span>
                    </div>
                    <div class="textePanier">
            <span class ='col-lg-3'>
                <?php echo "<p><br><br><strong> $price € TTC </strong><br> (".number_format($priceHT,2) ."€ HT )</p>"; ?>
            </span>
                        </div>
            <div class ='col-lg-1'>
                <?php echo "<br><br><a style='color: grey; font-size: 50px' href='?action=delete&prod=".$order."'> <span  class='glyphicon glyphicon-trash'></span></a>"; ?>
            </div>
        </span>

        </div>
        <br>

    <?php  endforeach ?>
    <form action="?action=seeCart" method="post">
        <label for="code">Avez vous un code promo ? </label>
        <input type="text" name="codePromo" id="code"/>
        <input type="submit" value="Appliquer ce code">
    </form>
    <div class="tabCart">
        <?php $totalpriceStr = number_format($totalprice,2);
        $totalpriceHTStr = number_format($totalpriceHT,2);
        $deliveryPriceStr = number_format($deliveryPrice,2);
        echo "<h4> <span class='titlePrice'> Votre panier : </span><span class='priceTTC'> $totalpriceStr € TTC <span class='priceHT'> ( $totalpriceHTStr € HT )</span></span></h4>";
        if (isset ($code) && $totalprice >= 40 ){
            echo '<h4> <span class="titlePrice"> Frais de livraison estimés :</span> <span class="barrePrix">' . $deliveryPriceStr . ' € </span> <span class="gratuit"> GRATUIT </span></h4>';
            $deliveryPrice = 0;
        }
        else {
            echo '<h4> <span class="titlePrice"> Frais de livraison estimés :</span> <span class="priceTTC">' . $deliveryPriceStr . ' € </span> </h4>';
        }
        echo '<h4> <span class="titlePrice"> Total :</span><span class="priceTTC"> '.number_format(($deliveryPrice+$totalprice),2). ' € TTC <span class="priceHT"> ( '.number_format(($deliveryPrice+$totalpriceHT),2).' € HT) </span></span> </h4>';

        ?>
    </div>
    <br>

    <form action="?action=readAdress" method="post">
        <?php echo "<input type='hidden' name='total' value = ".($deliveryPrice+$totalprice).">" ?>
        <input type="submit" value="Valider mon panier">
    </form>

<?php  }?>
