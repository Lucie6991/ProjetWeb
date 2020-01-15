<?php

    foreach ($tab_productsCat as $ligne) {
        $nom = $ligne->getName();
        $description = $ligne->getDescription();
        $image = $ligne->getImage();
        $prix = $ligne->getPrice();
        $id = $ligne->getId();
        echo "<div class ='row'>";
            echo "<div class ='col-lg-3'>";
                echo "<img class ='image_produit' src='view/images/$image'>";
            echo "</div>";
            echo "<div class ='col-lg-9'>";
                echo "<br>";
                echo "<h4>$nom <br> </h4>";
                echo "$description <br>";
                echo "Notre prix : ". $prix." €<br>";
               // echo "<a href ='?action=read&id=" . $id ."' class='btn btn-success'"> Acheter</a> <br>";
                echo "<a class='btn btn-success'  href='?action=read&id=".$id."'>Détails</a><br>";
            echo "</div>";
        echo "</div>";
        echo "<br>";
    }

?>

