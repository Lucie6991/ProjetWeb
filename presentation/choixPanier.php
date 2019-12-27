<?php

$titre="Choix panier";
include('include.php');

try {
    $id_produit=$_GET['id'];
    $undlg = new DialogueBD();
    $monProduit = $undlg->getProduit($id_produit);
}
catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>

<div>
    <?php
    if (isset($msgErreur)) {
        echo "Erreur : $msgErreur"; }  // a voir ou on place
    ?>
</div>
<div class="container">
    <?php getHeader();
    getAside1(); ?>
    <section class="col-lg-8">
            <?php
            foreach ($monProduit as $ligne) {
                $nom = $ligne['name'];
                echo "<h2 class ='nom_produit'> $nom </h2>";
                $description = $ligne['description'];
                $image = $ligne['image'];
                $prix = $ligne['price'];
                $id = $ligne['id'];
                echo "<div class ='row'>";
                    echo "<div class ='col-lg-5'>";
                        echo "<img class ='image_produit' src='images/$image'>";
                    echo "</div>";
                    echo "<div class ='col-lg-7'>";
                        echo "<h3> C'est un très bon choix ! </h3>";
                        echo "Prix : $prix <br> ";?>
                        <div class ='col-lg-2'>
                            <button class='btn btn-dark' onclick="clic_moins();"> <span class='glyphicon glyphicon-minus'></span></button>
                        </div>
                        <div class ='col-lg-3'>
                            <input class="form-control" id="quantite" type="text" placeholder="1" readonly="">
                        </div>
                        <div class ='col-lg-2'>
                            <button class='btn btn-dark' onclick="clic_plus()";> <span class='glyphicon glyphicon-plus'></span></button>
                        </div>
            <?php
                    echo"</div>";
                     echo"<button class='btn btn-warning'> <span class='glyphicon glyphicon-shopping-cart'></span> Ajouter au panier</button>";
                echo "</div>"; // fin de la classe row
            }   // fin du foreach

        getFooter();
            ?>
    </section>

    <?php getAside2();?>

</div>

</body>
</html>
