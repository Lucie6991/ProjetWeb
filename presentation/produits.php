
<?php
$titre=("Liste des produits");
include("include.php");

try {
    $id_cat=$_GET['categ'];
    $undlg = new DialogueBD();
    $unecat = new Categorie();
    $unProduit = new Product();
    $mesproduits = $unProduit->getTousLesProduits();
    $mesCategories = $unecat->getToutesLesCategories();
    $mesProduitsDeLaCat = $undlg->getTousLesProduitsDeLaCat($id_cat);
}
catch (Exception $e) {
    $erreur = $e->getMessage(); }

if (isset($msgErreur)) {
    echo "Erreur : $msgErreur"; }
?>

<div class="container">
    <?php getHeader(); ?>
    <div class="row">
        <?php getAside1(); ?>
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

            <?php getFooter();?>
        </section>

        <?php getAside2();?>

    </div>



</div>

</body>
</html>