<h1> Détail de la commande : </h1>
<h2> Récapitulatif de la commande : </h2>
<?php
$filePath = File::build_path(array('view',"admin","files_users",$nameFile.'.txt'));
$fileUser = fopen($filePath, 'a+');
$col_customers = array("forename","surname","add1","add2","add3","postcode","phone","email");
$col_adresse = array("forename","surname","add1","add2","add3","postcode","phone","email");
$title_add = array("Nom : ","Prénom : ","Adresse : ","Télephone : ","Email : ");
$col_orders = array("id","payment_type","date","total");
$title_orders = array("Numéro de commande", "Type de paiement","Date","Total de la commande");

foreach ($tab_order as $order){
    for ($i=0; $i<count($col_orders); $i++){
        $data = $order->get($col_orders[$i]);
        $title = $title_orders[$i];
        echo "<strong> $title :</strong> $data <br>";
        fputs($fileUser, $title." : ".$data.";");
    }
    //fputs($fileUser, "\n");
}
?>
<h2> Informations du client : </h2>
<?php
foreach ($tab_customer as $customer){

    for ($i=0; $i<count($col_customers); $i++){
        $data = $customer->get($col_customers[$i]);
        if( $i ==3 || $i ==4 ||$i ==5){
            $title = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<strong> $title</strong> $data <br>";
            $title ="";
        }
        else {
            if( $i ==6 || $i ==7){
                $title = $title_add[$i-3];
            }
            else{
                $title = $title_add[$i];
            }
            echo "<strong> $title</strong> $data <br>";
        }
        if ($data == ""){
            $data = " ";
        }
        fputs($fileUser, $title.$data.";");
    }
    //fputs($fileUser, "\n");
}
?>

<h2> Adresse de livraison :</h2>
<?php
foreach ($tab_adress as $add){
    for ($i=0; $i<count($col_adresse); $i++){
        $data = $add->get($col_adresse[$i]);
        if( $i ==3 || $i ==4 ||$i ==5){
            $title = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<strong> $title</strong> $data <br>";
            $title ="";
        }
        else {
            if( $i ==6 || $i ==7){
                $title = $title_add[$i-3];
            }
            else{
                $title = $title_add[$i];
            }
            echo "<strong> $title</strong> $data <br>";
        }
        if ($data == ""){
            $data = " ";
        }
        fputs($fileUser, $title.$data.";");
    }
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
fclose($fileUser);
echo "<a href='?action=seeBill&order=".$id_order."' class='btn btn-info' > <span class='glyphicon glyphicon-save'></span>  Télécharger la facture </a><br><br>";
echo "<a href='?action=confirmOrder&order=".$id_order."' class='btn btn-success' > <span class='glyphicon glyphicon-send'></span>  Confirmer le paiment</a>";
?>