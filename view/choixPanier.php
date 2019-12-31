<?php

//require_once('../model/Product.php');

//Récupération de l'id de la vue produits.php
//$id_product = $_GET['id'];
//Ligne de code bizarre ??
//$monProduit=Product::getProduit($id_product);

foreach ($tab_product as $ligne) {
    $nom = $ligne->getName();
    echo "<h2 class ='nom_produit'> $nom </h2>";
    $description = $ligne->getDescription();
    $image = $ligne->getImage();
    $prix = $ligne->getPrice();
    $id = $ligne->getId();
    $quantity = $ligne->getQuantity();
}

    echo "<img class ='image_produit' src='view/images/$image'>";
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
//echo "<button class='btn btn-warning' href='?action=addToCart&id=".$id."'> <span class='glyphicon glyphicon-shopping-cart'></span>Ajouter au panier</button>";
echo "<a href='?action=addToCart&id=".$id."&q=1' class='btn btn-warning'> Ajouter au panier</a>";

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
            echo "<br><strong>$name_user :</strong> $title <br> <em>$description</em> <br>"?>
        </div>
    </div>
    <br>
<?php endforeach  ?>