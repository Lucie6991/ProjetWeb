<?php
    foreach ($tab_productsCat as $ligne) {
        $nom = $ligne->getName();
        $description = $ligne->getDescription();
        $image = $ligne->getImage();
        $prix = $ligne->getPrice();
        $id = $ligne->getId();
        echo "<div class ='row'>";
        echo "<div class ='col-lg-1'></div>";
        echo "<div class ='col-lg-3'>";
        echo "<img class ='image_produit' src='view/images/$image'>";
        echo "</div>";
        echo "<div id= 'descriptionProd' class ='col-lg-7'>";
        echo "<h4>$nom <br> </h4>";
        echo "$description <br>";
        echo "Notre prix : ". $prix." €<br><br>";
        echo "<a class='btn btn-success' id='btn_detail' href='?action=read&id=".$id."'>Voir le détail du produit</a><br>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }

?>

