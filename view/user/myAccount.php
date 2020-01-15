<?php
echo "<h1>Mon compte</h1>";

if (!empty($tab_order_cheque)){
    echo "<h3> Vos commandes payées par chèques en attente de reception du chèque </h3>";
    echo "<p> A reforumuler je sais pas quoi dire mdr  </p>";
    foreach($tab_order_cheque as $ligne) {
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
    }
}
if (!empty($tab_order_prep)){
    echo "<h3> Vos commandes en cours de préparation :  </h3>";
    foreach($tab_order_prep as $ligne){
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
        echo "$date <br>";
        echo "$status";
    }
}
if (!empty($tab_order_liv)){
    echo "<h3> Vos commandes en cours de livraison :  </h3>";
    foreach($tab_order_liv as $ligne) {
        $payment_type = $ligne->get('payment_type');
        $date = $ligne->get('date');
        $status = $ligne->get('status');
        $total = $ligne->get('total');
        echo "$date <br>";
        echo "$status";
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
        echo "$date <br>";
        echo "$status";

        echo "<a href='?action=seeBillUser&order=".$id_order."' class='btn btn-info' > <span class='glyphicon glyphicon-save'></span>  Télécharger la facture </a><br><br>";
    }
}
if (empty($tab_order_cheque) && empty($tab_order_prep) && empty($tab_order_liv) && empty($tab_order_fini) ){
    echo "<h3> Vous n'avez jamais effectué de commande chez nous... Rattrapez vous !   </h3>";
}