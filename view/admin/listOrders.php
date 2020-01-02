<?php

if (empty($tab_orders)){
    echo "<h3> Il n'y a pas de commande en cours </h3>";
}
else{
    foreach ($tab_orders as $order) {
        $total = $order->getTotal();
        $payment_type = $order->getPaymentType();
        $id = $order->getId();
        echo "id : $id total : $total <br>";
    }
}