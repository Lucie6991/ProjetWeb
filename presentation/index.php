
<?php
$titre="Page d'accueil";
include('include.php');
try {
    $undlg = new DialogueBD();
    $mesCategories = $undlg->getToutesLesCategories();
}
catch (Exception $e) {
    $erreur = $e->getMessage();
    }
?>

<body>
<div class="container">
    <?php getHeader(); ?>
    <div class="row">

        <?php getAside1(); ?>

        <section class="col-lg-8">
            <h2>Bienvenue !</h2>
            <!-- A changer c est pas bien accrocheur mdr -->
            <p> Bienvenue sur ISIWEB4SHOP. Cliquez sur la liste de gauche pour découvrir nos offres. Nous avons en stock une large gamme de produits. </p>
            <?php getFooter(); ?>
        </section>

        <?php getAside2(); ?>

    </div>



</div>

</body>
</html>