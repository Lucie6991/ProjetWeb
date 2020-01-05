<?php
//if (!empty($_SESSION['custom_id'])){
    foreach ($tab_adress as $ligne) {
        $prenom = $ligne['forname'];
        $nom = $ligne['surname'];
        $add1 = $ligne['add1'];
        $add2 = $ligne['add2'];
        $city = $ligne['city'];
        $postcode = $ligne['postcode'];

        echo $nom." ".$prenom ;
        echo "<br />";
        echo $add1;
        echo "<br />";
        echo $add2;
        echo "<br />";
        echo $postcode ." ". $city;
        echo "<br />";


    }
//}
