<?php

if (empty($tab_orders)){
    echo "<h3> Il n'y a pas de commande en cours </h3>";
}
else {
    echo "<h1> Les commandes :</h1>";
    foreach ($tab_orders as $ligne):
        $total = $ligne->get("total");
        $payment_type = $ligne->get("payment_type");
        $id = $ligne->get("id");
        $customer_id = $ligne->get("CustomerId");
        $date = $ligne->get("date");?>
        <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-10'>
                <?php
                echo " <strong> Numéro de commande :</strong> $id <br>";
                echo " <strong> Date de commande : </strong> $date <br>";
                echo " <strong> Type de paiement : </strong> $payment_type <br>";
                ?>
            </div>
            <span class ='col-lg-2'>
                <?php echo "<br><a style='color: grey; font-size: 50px' href='?action=readOrder&order=".$id . "'> <span class='glyphicon glyphicon-list-alt'></span></a> "?>
            </span>
        </span>
        </div>
        <br>
    <?php endforeach;
}
    ?>