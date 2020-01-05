<?php
if (empty($tab_cart)){
    echo "<h3> Votre panier est vide</h3>";
}
else{
    ?>
    <div class ='row'>
        <div class ='col-lg-2'>
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
        <span class ='col-lg-2'>
            <h3> PRIX </h3>
        </span>
        </div>
    </div>

<?php
    $totalprice =0;
    foreach ( $tab_cart as $ligne) :
        $id= $ligne['id'];
        $quantiteCommande = $ligne['qte'];
        $name = $ligne['name'];
        $price = $ligne['price'];
        $order=$ligne['order'];
        $image = $ligne['image'];
        $totalprice+=$price;
        ?>
    <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-2'>
                <?php echo "<img class ='panier' src='view/images/$image'>"; ?>
            </div>
            <span class ='col-lg-5'>
                <?php echo "<h4><br><br> &nbsp $name</h4>"; ?>
            </span>
                <div class="textePanier">
            <span class ='col-lg-2'>
                <?php echo "<p><br><br> $quantiteCommande</p>"; ?>
            </span>
                    </div>
                    <div class="textePanier">
            <span class ='col-lg-2'>
                <?php echo "<p><br><br> $price €</p>"; ?>
            </span>
                        </div>
            <div class ='col-lg-1'>
                <?php echo "<br><br><a style='color: grey; font-size: 50px' href='?action=delete&prod=".$order."'> <span  class='glyphicon glyphicon-trash'></span></a>"; ?>
            </div>
        </span>

    </div>
        <br>

   <?php  endforeach ?>
    <?php $totalpriceStr = number_format($totalprice,2);
    echo "<h3> Prix total du panier : $totalpriceStr €</h3>"; ?>

    <a class='btn btn-success'> Passer la commande<a/>
<?php  }?>
