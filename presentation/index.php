
<?php
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $mesCategories = $undlg->getToutesLesCategories();
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
<div class="container">
    <?php include('header.inc.php'); ?>
    <div class="row">

        <?php include('aside1.inc.php'); ?>

        <section class="col-lg-8">
            <h2>Bienvenue !</h2>
            <!-- A changer c est pas bien accrocheur mdr -->
            <p> Bienvenue sur ISIWEB4SHOP. Cliquez sur la liste de gauche pour découvrir nos offres. Nous avons en stock une large gamme de produits. </p>
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