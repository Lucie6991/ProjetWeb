<?php

if (empty($tab_cheque)){
    echo "<h3> Il n'y a aucun chèque à receptionner </h3>";
}
else {
    echo "<h1> Les commandes payées par chèque :</h1>";
    foreach ($tab_cheque as $ligne):
        $total = $ligne->get("total");
        $id = $ligne->get("id");
        $customer_id = $ligne->get("CustomerId");
        $date = $ligne->get("date");?>
        <div class="tabCart">
        <span class ='row' >
            <div class ='col-lg-10'>
                <?php
                echo " <strong> Numéro de commande :</strong> $id <br>";
                echo " <strong> Date de commande : </strong> $date <br>";
                echo " <strong> Total de la commande : </strong> $total <br>";
                ?>
            </div>
            <span class ='col-lg-2'>
                <?php echo "<br><a style='color: green; font-size: 50px' href='?action=validateCheck&order=".$id . "'> <span class='glyphicon glyphicon-check'></span></a> "?>
            </span>
        </span>
        </div>
        <br>
    <?php endforeach;
}
?>