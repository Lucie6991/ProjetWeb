
<?php
foreach ($tab_order as $order){
    $date = $order->get("date");
    $payment_type = $order->get("payment_type");
    $total = $order->get("total");
}
foreach ($tab_adress as $add){
    $surnameA = $add->get("surname");
    $forenameA = $add->get("forename");
    $add1A = $add->get("add1");
    $add2A = $add->get("add2");
    $add3A = $add->get("add3");
    $postcodeA = $add->get("postcode");
    $phoneA = $add->get("phone");
    $emailA = $add->get("email");
}

foreach ($tab_customer as $customer){
    $surnameC = $customer->get("surname");
    $forenameC = $customer->get("forename");
    $add1C = $customer->get("add1");
    $add2C = $customer->get("add2");
    $add3C = $customer->get("add3");
    $postcodeC = $customer->get("postcode");
    $phoneC = $customer->get("phone");
    $emailC = $customer->get("email");
    $registeredC = $customer->get("registered");
}
?>
<h1> Détail de la commande : </h1>
<h2> Infos du client : </h2>
<?php
echo "$surnameC <br>";
echo "$forenameC <br>";
echo "$add1C <br>";
echo "$add2C <br>";
echo "$add3C <br>";
echo "$postcodeC <br>";
echo "$phoneC <br>";
echo "$emailC <br>";
echo "$payment_type <br>";
echo "$date <br>";
?>
<h2> Adresse de livraison :</h2>
<?php
if (empty($tab_address)){
    echo "Adresse non indiquée";    // a enleer ca ce ne sera pas possible
}
else{
    echo "$surnameA <br>";
    echo "$forenameA <br>";
    echo "$add1A <br>";
    echo "$add2A <br>";
    echo "$add3A <br>";
    echo "$postcodeA <br>";
    echo "$phoneA <br>";
    echo "$emailA <br>";
    echo "$payment_type <br>";
    echo "$date <br>";
}

?>

<h2> Les produits de la commande :</h2>
<div class ='row'>
    <div class ='col-lg-2'>
    </div>
    <div class="textePanier">
        <span class ='col-lg-6'>
            <h3> ARTICLE </h3>
        </span>
    </div>
    <div class ='col-lg-3'>
        <h3> QUANTITE </h3>
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
            <div class ='col-lg-2'>
                <?php echo "<img class ='panier' src='view/images/$image'>"; ?>
            </div>
            <span class ='col-lg-6'>
                <?php echo "<h4><br><br>&nbsp &nbsp $name</h4>"; ?>
            </span>
                <div class="textePanier">
            <span class ='col-lg-2'>
                <?php echo "<p><br><br> $quantiteCommande</p>"; ?>
            </span>
                    </div>
        </span>

    </div>
        <br>

   <?php  endforeach ?>

<?php
echo "<a href='?action=seeBill&order=".$id_order."' class='btn btn-info' > <span class='glyphicon glyphicon-save'></span>  Télécharger la facture </a><br><br>";
echo "<a href='?action=confirmOrder&order=".$id_order."' class='btn btn-success' > <span class='glyphicon glyphicon-send'></span>  Confirmer le paiment</a>";
?>
