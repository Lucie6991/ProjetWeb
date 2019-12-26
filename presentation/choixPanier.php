<?php
require_once '../persistance/DialogueBD.php';
try {
    $id_produit=$_GET['id'];
    $undlg = new DialogueBD();
    $monProduit = $undlg->getProduit($id_produit);
}
catch (Exception $e) {
    $erreur = $e->getMessage(); }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Choix du panier</title>
</head>
<body>
<?php
if (isset($msgErreur)) {
    echo "Erreur : $msgErreur"; }
?>

<div class="container">

    <?php include('header.inc.php'); ?>

    <div class="row">

        <?php include('aside1.inc.php'); ?>

        <section class="col-lg-8">

                <?php
                foreach ($monProduit as $ligne) {
                    $nom = $ligne['name'];
                    echo "<h2> Vous voulez acheter le produit suivant : $nom </h2>";
                    $description = $ligne['description'];
                    $image = $ligne['image'];
                    $prix = $ligne['price'];
                    $id = $ligne['id'];
                    echo "<div class ='row'>";
                    echo "<div class ='col-lg-3'>";
                    echo "<img src='images/$image'>";
                    echo "</div>";
                    echo "<div class ='col-lg-9'>";
                    echo "$description <br> Prix : $prix <br> ";
                    echo "</div>";
                    echo "</div>";
                    echo "<h2> En quelle quantité ?  </h2>";
                    echo "<p> mettre un bouton plus / moins   </p>";
                }
                ?>

            <?php include ('footer.inc.php')?>
        </section>

        <div class="col-lg-2">
            <div class="row">
                <aside class="col-lg-12">
                    <!-- Peut etre enlevé mais a voir si on peut y mettre des choses -->
                    Aside
                </aside>
            </div>
        </div>

    </div>



</div>

</body>
</html>
