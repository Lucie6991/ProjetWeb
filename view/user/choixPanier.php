<?php

foreach ($tab_product as $ligne) {
    $nom = $ligne->getName();
    echo "<h2 class ='nom_produit'> $nom </h2>";
    $description = $ligne->getDescription();
    $image = $ligne->getImage();
    $prix = $ligne->getPrice();
    $prixHT = $prix/1.2;
    $id = $ligne->getId();
    $quantity = $ligne->getQuantity();?>
    <div class ='row'>
        <div class ='col-lg-5'>
            <?php echo "<img class ='image_produit_choixPanier' src='view/images/$image'/>";?>
        </div>
        <div class ='col-lg-7'>
            <?php
            echo "<p> <span style='font-size: 1.5em;'>&nbsp&nbsp&nbsp&nbsp $prix € TTC </span>( " . number_format($prixHT, 2) . " € HT )</p><br>  ";

            if(empty($_SESSION["admin"])) {
                if ($quantity >0 ) {
                    if ($quantity < 6) {
                        echo '<div class="alert alert-warning">';
                        echo '<strong>Attention !</strong> Le  produit est bientôt en rupture de stock, il en reste seulement ' . $quantity . ' !';
                        echo '</div>';
                    }
                    ?>
                    <div class='col-lg-2'>
                        <button class='btn btn-dark' onclick="clic_moins();"><span
                                    class='glyphicon glyphicon-minus'></span></button>
                    </div>
                    <div class='col-lg-3'>
                        <?php echo '<form action="?action=addToCart&id=' . $id . '" method="post">' ?>
                        <input class="form-control" name="quantite" id="quantite" type="text" value="1"
                               placeholder="1" readonly>
                        <div class='row'>
                            <br/>
                            <button class='btn btn-warning' type="submit"><span
                                        class='glyphicon glyphicon-shopping-cart'></span> Ajouter au panier
                            </button>
                        </div>
                        <?php echo '</form>' ?>
                    </div>
                    <div class='col-lg-2'>
                        <button class='btn btn-dark' onclick="clic_plus();"><span
                                    class='glyphicon glyphicon-plus'></span></button>
                    </div> <?php
                }
                // Si le produit n'est pas disponible => pas possible de le mettre au panier
                else {
                    ?>
                    <div class='col-lg-2'>
                        <button class='btn btn-dark'><span class='glyphicon glyphicon-minus'></span></button>
                    </div>
                    <div class='col-lg-3'>
                        <input class="form-control" id="quantite" type="text" value="0" placeholder="1" readonly>
                    </div>
                    <div class='col-lg-2'>
                        <button class='btn btn-dark'><span class='glyphicon glyphicon-plus'></span></button>
                    </div>
                    <div class="row"></div>
                    <div class="alert alert-danger">
                        <strong>Attention !</strong> Le produit est momentanément indisponible !
                    </div>

                <?php }
            }
}
?>
        </div>
    </div>

    <h3> Description du produit :</h3>
    <?php echo '<p>'. $description .'</p>' ;

echo "<h3> Ils l'ont aussi acheté :  </h3>";
foreach($tab_review as $review) :
    $photo_user =$review->getPhotoUser();
    $name_user =$review->getNameUser();
    $description =$review->getDescription();
    $title =$review->getTitle();
    $stars =$review->getStars();
    ?>
    <div class="row" style='border: solid grey 1px;'>
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