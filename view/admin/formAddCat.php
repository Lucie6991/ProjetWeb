<?php
if (isset($message)){
    echo "<h3 class='gratuit'>$message</h3>";
}
?>
<form action="?action=addedCat" method="post">
    <label for="champNom"> Nom de la catégorie :</label>
    <input type="text" name="nom" id="champNom" required />
    <p></p>
    <input type="submit" value="Ajouter">
</form>