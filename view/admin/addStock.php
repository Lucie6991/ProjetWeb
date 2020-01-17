<?php
if (isset($message)){
    echo "<h3 class='gratuit'>".$message."</h3><br>";
}
?>

<form action="?action=updateStock" method="post">
    <label for="champProd"> Nom du produit</label>
    <div class="form-group">
        <select name="prod" id="champProd" class="form-control">
            <?php
            foreach ($tab_product as $prod) {
                echo '<option value="'.$prod->getId().'">'.$prod->getName().'</option>';
            }
            ?>
        </select>
    </div>
    <p></p>
    <label for="stock"> Quantité à ajouter</label>
    <div class="row">
        <div class ='col-lg-3'></div>
        <div class ='col-lg-1'>
            <button type="button" class='btn btn-dark' onclick="clic_moins();"> <span class='glyphicon glyphicon-minus'></span></button>
        </div>
        <div class ='col-lg-3'>
            <input class="form-control" name="stock" id="quantite" type="text" value="1" placeholder="1" readonly>
        </div>
        <div class ='col-lg-1'>
            <button type="button" class='btn btn-dark' onclick="clic_plusA();"> <span class='glyphicon glyphicon-plus'></span></button>
        </div>
    </div>

    <input type="submit" value="Valider l'ajout de stock ">

</form>