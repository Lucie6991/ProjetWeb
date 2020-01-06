<?php

foreach ($tab_product as $ligne) {
    $nom = $ligne->getName();
    echo "<h2 class ='nom_produit'> $nom </h2>";
    $description = $ligne->getDescription();
    $image = $ligne->getImage();
    $prix = $ligne->getPrice();
    $id = $ligne->getId();
    $quantity = $ligne->getQuantity();

    echo "<div class ='row'>";
        // Première partie de la page centrale
        echo "<div class ='col-lg-7'>";

            if ($quantity ==0){
                 echo "<h3 class='ProdRupture'>  Produit en rupture de stock </h3>";
            }
            else if ($quantity >3){
                echo "<h3> C'est un très bon choix ! </h3>";}
            else{
            echo "<h3 class='ProdLimite'> Les quantités de ce produits sont limitées... </h3>";
                //echo '<div class="alert alert-primary">';
                //echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                //echo '<p class="alert alert-primary" role="alert ">Les quantités de ce produits sont limitées... </p>';
                //echo '</div>';
            }
        echo "</div>";
    echo "</div>";

    echo "<div class ='row'>";

        echo "<div class ='col-lg-5'>";
            echo "<img class ='image_produit' src='view/images/$image'/>";
        echo "</div>";

            echo "<div class ='col-lg-7'>";
                echo "Prix : $prix <br> ";

                if ($quantity > 0){?>
                   <div class ='col-lg-2'>
                       <button class='btn btn-dark' onclick="clic_moins();"> <span class='glyphicon glyphicon-minus'></span></button>
                   </div>
                   <div class ='col-lg-3'>
                       <input class="form-control" id="quantite" type="text" value="1" placeholder="1" readonly>
                       <div class='row'>
                           <br />
                           <?php
                           echo "<a href='?action=addToCart&id=".$id."&q=1' class='btn btn-warning' > <span class='glyphicon glyphicon-shopping-cart'></span> Ajouter au panier</a>"
                           ?>
                       </div></div>
                   <div class ='col-lg-2'>
                       <button class='btn btn-dark' onclick="clic_plus();"> <span class='glyphicon glyphicon-plus'></span></button>
                   </div>
               <?php
                }
               // Si le produit n'est pas disponible => pas possible de le mettre au panier
                else { ?>
                   <div class ='col-lg-2'>
                       <button class='btn btn-dark'> <span class='glyphicon glyphicon-minus'></span></button>
                   </div>
                   <div class ='col-lg-3'>
                       <input class="form-control" id="quantite" type="text" value="0" placeholder="1" readonly>
                   </div>
                   <div class ='col-lg-2'>
                       <button class='btn btn-dark'> <span class='glyphicon glyphicon-plus'></span></button>
                   </div>

                    <div class="row"> </div>
                    <p class ='messageRupture'> Le produit est momentanément insdiponible. </p>
                    <?php
                }
            echo"</div>";
    echo"</div>";
}

echo "<h3> Ils l'ont aussi acheté :  </h3>";
foreach($tab_review as $review) :
    $photo_user =$review->getPhotoUser();
    $name_user =$review->getNameUser();
    $description =$review->getDescription();
    $title =$review->getTitle();
    $stars =$review->getStars();
    ?>
    <div class ='row' style='border: solid grey 1px;'>
        <div class ='col-lg-2' >
            <?php echo "<img class='photoUser' src='view/images/$photo_user'>"?>
        </div>
        <div class ='col-lg-10'>

            <?php for ($i=0; $i<$stars; $i++){
                echo "<img class='stars' src='view/images/review_star.png'> ";
            }
            for ($j=$stars; $j<5; $j++){
                echo "<img class='stars' src='view/images/review_gray.png'> ";
            }
            echo "<br><strong>$name_user :</strong> $title <br> <em>$description</em> <br>";
            ?>
        </div>
    </div>
    <br>
<?php endforeach  ?>