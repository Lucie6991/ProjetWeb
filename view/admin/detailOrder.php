<h1> Détail de la commande : </h1>
<h2> Récapitulatif de la commande : </h2>
<?php
//$directoryPath = File::build_path(array('view',"admin"));
//chmod(File::build_path(array('view',"admin","files_users")), 777);
$filePath = File::build_path(array('view',"admin","files_users",$nameFile.'.txt'));
$fileUser = fopen($filePath, 'c+b');
$col_customers = array("forname","surname","add1","add2","add3","postcode","phone","email");
$col_adresse = array("firstname","lastname","add1","add2","city","postcode","phone","email");
$title_add = array("Nom : ","Prénom : ","Adresse : ","Télephone : ","Email : ");
$col_orders = array("id","payment_type","date","total");
$title_orders = array("Numéro de commande", "Type de paiement","Date","Total de la commande");
$texte = "";
foreach ($tab_order as $order){
    for ($i=0; $i<count($col_orders); $i++){
        $totalCommande=$order->get('total');
        $data = $order->get($col_orders[$i]);
        $title = $title_orders[$i];
        echo "<strong> $title :</strong> $data <br>";
        $texte .= $title." : ".$data.";";
    }
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
        $texte.=$title.$data.";";
    }
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
        $texte.=$title.$data.";";
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
$texte.="Montant HT :;TVA :;Sous total TTC: ;Frais de livraison: ;TOTAL TTC: ;";
$soustotal=0;$price=0;$priceHT=0;$TVA=0;

foreach ($tab_order_item as $ligne){
    $quantiteCommande = $ligne['qte'];
    $price = $ligne['price']*$quantiteCommande;
    $priceHT+= $price/1.2;
    $TVA += $price/6;
    $soustotal+=$price;
}
if (number_format($soustotal,2) == $totalCommande)
    $delivery = 'GRATUIT';
else
    $delivery = '6,50';
$texte.=number_format($priceHT,2).';'.number_format($TVA,2).';'.number_format($soustotal,2).';'.$delivery.';';
if ($delivery == 'GRATUIT'){
    $total=$soustotal;
}
else{
    $total = $soustotal+6.5;
}
$texte.=number_format($total,2).';PRODUIT;QUANTITE;PRIX UNITAIRE;';
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
    <?php
    $texte.=$name.';'.$quantiteCommande.';'.$price.';';
endforeach ?>

<?php
fputs($fileUser,$texte);
fclose($fileUser);
if (isset($facture)){
    echo 'oui';
}

echo "<a href='?action=seeBill&order=".$id_order."' target='_blank' class='btn btn-info' onclick='bill();'> <span class='glyphicon glyphicon-save'></span>  Générer la facture </a><br><br>";
echo '<div id="confirmer" class="confirmer"> ';
echo "<a href='?action=confirmOrder&order=".$id_order."' class='btn btn-success' > <span class='glyphicon glyphicon-send'></span>  Confirmer le paiment</a>";
echo'</div>';
?>
