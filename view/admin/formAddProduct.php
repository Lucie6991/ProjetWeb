<?php
if (isset($message)){
    echo "<h3 class='gratuit'>$message</h3><br>";
}
$tab_cat = Categorie::getAllCategories();
?>

<form action="?action=addedProd" method="post">
    <label for="champCat"> Nom de la catégorie :</label>
    <div class="form-group">
        <select name="cat" id="champCat" class="form-control">
            <?php
            foreach ($tab_cat as $cat) {
                echo '<option value="'.$cat->getId().'">'.$cat->getName().'</option>';
            }
            ?>
        </select>
    </div>
    <p></p>
    <label for="champName"> Nom du produit:</label>
    <input type="text" name="name" id="champName" required />
    <p></p>
    <label for="champDescription"> Description du produit:</label>
    <textarea type="text" name="desc" id="champDescription" required></textarea>
    <p></p>
    <label for="champImage"> Nom de l'image :</label>
    <div class="form-group">
        <input type="file" class="form-control-file" id="champImage" name="image" aria-describedby="fileHelp">
    </div>
    <p></p>
    <label for="champPrice"> Prix du produit:</label>
    <input type="text" name="price" id="champPrice" required />
    <p></p>
    <label for="champQte"> Nombre de produits en stock: </label>
    <input type="text" name="qte" id="champQte" required />
    <p></p>
    <input type="submit" value="Ajouter ce produit">

</form>