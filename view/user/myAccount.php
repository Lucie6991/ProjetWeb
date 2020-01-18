
<h1>Mon compte</h1>
<h3>Vos informations personnelles : </h3>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
<div class="FormConnexion">
    <?php
foreach ($tab_adress as $ligne) {
    $prenom = $ligne->get('forname');
    $nom = $ligne->get('surname');
    $add1 = $ligne->get('add1');
    $add2 = $ligne->get('add2');
    $city = $ligne->get('add3');
    $postcode = $ligne->get('postcode');
    $phone = $ligne->get('phone');
    $email = $ligne->get('email');

    echo "<label name='CoordLabel'>  Identité : </label> ";
    echo $nom . " " . $prenom;
    echo "<br />";
    echo "<label name='CoordLabel'>  Adresse : </label> ";
    echo $add1;
    echo "<br />";
    if (!empty($add2)){
        echo "<label name='CoordLabel'></label>";
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$add2;
        echo "<br />";
    }
    echo "<label name='CoordLabel'></label>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$postcode . " " . $city;
    echo "<br />";
    echo "<label name='CoordLabel'>  Téléphone : </label> ";
    echo $phone;
    echo "<br />";
    echo "<label name='CoordLabel'>  Email : </label> ";
    echo $email;
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

if (!empty($tab_order_cheque)){
    echo "<h3> Vos commandes en attente de confirmation de la réception du chèque</h3>";
    foreach($tab_order_cheque as $ligne) {
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
         ?>
        <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-10'>
                <?php
                echo " <strong> Date de commande : </strong> $date <br>";
                echo " <strong> Total de la commande : </strong> $total €<br>";
                echo " <strong> Type de paiement : </strong> $payment_type <br>";
                ?>
            </div>
            <span class ='col-lg-2'>
                <?php echo "<br><a style='color: grey; font-size: 50px'> <span class='glyphicon glyphicon-list-alt'></span></a> "?>
            </span>
        </span>
        </div>
<?php
    }
}

if (!empty($tab_order_prep)){
    echo "<h3> Vos commandes en cours de préparation :  </h3>";
    foreach($tab_order_prep as $ligne){
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
        ?>
        <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-10'>
                <?php
                echo " <strong> Date de commande : </strong> $date <br>";
                echo " <strong> Total de la commande : </strong> $total €<br>";
                echo " <strong> Type de paiement : </strong> $payment_type <br>";
                ?>
            </div>
            <span class ='col-lg-2'>
                <?php echo "<br><a style='color: grey; font-size: 50px'> <span class='glyphicon glyphicon-list-alt'></span></a> "?>
            </span>
        </span>
        </div>
<?php
    }
}
if (!empty($tab_order_liv)){
    echo "<h3> Vos commandes en cours de livraison :  </h3>";
    foreach($tab_order_liv as $ligne) {
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
        ?>
        <div class="tabCart">
                <span class ='row' >
                    <div class ='col-lg-10'>
                        <?php
                        echo " <strong> Date de commande : </strong> $date <br>";
                        echo " <strong> Total de la commande : </strong> $total €<br>";
                        echo " <strong> Type de paiement : </strong> $payment_type <br>";
                        ?>
                    </div>
                    <span class ='col-lg-2'>
                        <?php echo "<br><a style='color: grey; font-size: 50px'> <span class='glyphicon glyphicon-list-alt'></span></a> "?>
                    </span>
                </span>
        </div>
        <?php
    }
}

if (!empty($tab_order_fini)){
    echo "<h3> Vos anciennes commandes  </h3>";
    foreach($tab_order_fini as $ligne){
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
        $id_order= $ligne->get('id');
?>
        <div class="tabCart">
                <span class ='row' >
                    <div class ='col-lg-9'>
                        <?php
                        echo " <strong> Date de commande : </strong> $date <br>";
                        echo " <strong> Total de la commande : </strong> $total €<br>";
                        echo " <strong> Type de paiement : </strong> $payment_type <br>";
                        ?>
                    </div>
                    <span class ='col-lg-3'>
                        <?php echo "<br><a href='?action=seeBill&order=".$id_order."' target='_blank' class='btn btn-info' > <span class='glyphicon glyphicon-save'></span>  Télécharger la facture </a><br><br>"; ?>
                    </span>
                </span>
        </div>

<?php
    }
}
if (empty($tab_order_cheque) && empty($tab_order_prep) && empty($tab_order_liv) && empty($tab_order_fini) ){
    echo "<h3> Vous n'avez jamais effectué de commande chez nous... Rattrapez vous !   </h3>";
}