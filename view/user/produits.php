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
                echo "$nom <br> $description <br> Notre prix : $prix <br> <a href='?action=read&id=" . $id . "'> Acheter</a> <br>";
            echo "</div>";
        echo "</div>";
        echo "<br>";
    }

?>

