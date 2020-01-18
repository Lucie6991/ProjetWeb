<?php
if (isset($erreur))
    echo '<h3 class="gratuit">'.$erreur.'</h3>'
?>

<form action="?action=changePsw" method="post">
    <label for="login">Votre login :</label>
    <input type="text" name="login" id="login" required />
    <p></p>

    <label for="password">Nouveau mot de passe :</label>
    <input type="password" name="password" id="password" required />
    <p></p>
    <label for="password">Confirmer mot de passe :</label>
    <input type="password" name="psw2" id="password" required />
    <p></p>
    <input type="submit" value="Changer mot de passe">
</form>
