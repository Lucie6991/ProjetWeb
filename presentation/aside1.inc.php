<?php
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $mesCategories = $undlg->getToutesLesCategories();
}
catch (Exception $e) {
    $erreur = $e->getMessage(); }
?>

<div class="col-lg-2">
    <div class="row">
        <aside class="col-lg-12">
            <h3>Nos offres</h3>
            <?php
            foreach ($mesCategories as $ligne) {
                $id = $ligne['id'];
                $nom = $ligne['name'];
                echo "<li> <a href='produits.php?categ=".$id."'>$nom </a> </li>";
            }
            ?>
        </aside>
        <aside class="col-lg-12">
            <!-- connexion a mettre en fonction si connecté ou pas -->
            Aside
        </aside>
    </div>
</div>
