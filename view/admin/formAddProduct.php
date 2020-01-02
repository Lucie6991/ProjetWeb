<?php
$tab_cat = Categorie::getAllCategories();
?>

<form action="?action=addedProd" method="post">
    <label for="champCat"> Nom de la catégorie :</label>
    <select name="cat" id="champCat">
        <?php
        foreach ($tab_cat as $cat) {
            echo '<option value="'.$cat->getId().'">'.$cat->getName().'</option>';
        }
        ?>
    </select>
    <p></p>
    <label for="champName"> Nom du produit:</label>
    <input type="text" name="name" id="champName" required />
    <p></p>
    <label for="champDescription"> Description du produit:</label>
    <input type="text" name="desc" id="champDescription" required />
    <p></p>
    <label for="champImage"> Nom de l'image :</label>
    <input type="text" name="image" id="champImage" placeholder="ex : fruit.jpg" required />
    <p></p>
    <label for="champPrice"> Prix du produit:</label>
    <input type="text" name="price" id="champPrice" required />
    <p></p>
    <label for="champQte"> Nombre de produits en stock: </label>
    <input type="text" name="qte" id="champQte" required />
    <p></p>
    <input type="submit" value="Ajouter ce produit">

</form>