
<?php
require_once '../persistance/DialogueBD.php';
try {
    $id_cat=$_GET['categ'];
    $undlg = new DialogueBD();
    $mesproduits = $undlg->getTousLesProduits();
    $mesCategories = $undlg->getToutesLesCategories();
    $mesProduitsDeLaCat = $undlg->getTousLesProduitsDeLaCat($id_cat);
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
    <title>Liste des produits</title>
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
            <h2>Liste des produits</h2>
            <ul>
                <?php
                foreach ($mesProduitsDeLaCat as $ligne) {
                    $nom = $ligne['name'];
                    $description = $ligne['description'];
                    $image = $ligne['image'];
                    $prix = $ligne['price'];
                    $id = $ligne['id'];
                    echo "<div class ='row'>";
                        echo "<div class ='col-lg-3'>";
                            echo "<img src='images/$image'>";
                        echo "</div>";
                        echo "<div class ='col-lg-9'>";
                            echo "$nom <br> $description <br> Notre prix : $prix <br> <a href='choixPanier.php?id=".$id."'> Acheter</a> <br>";
                        echo "</div>";
                    echo "</div>";
                }
                ?>
            </ul>

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