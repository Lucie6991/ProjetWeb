<?php
if (isset ($message)){
    echo "<h3 class='gratuit'>$message</h3>";
}
?>
    <form action="?action=addedAdmin" method="post">
        <fieldset>
            <legend>Renseigner les informations suivantes :</legend>

            <label for="champNom">Login :</label>
            <input type="text" name="login" id="username" required />
            <p></p>

            <label for="champMdp">Mot de passe :</label>
            <input type="password" name="password" id="password" required />
            <p></p>
            <input type="submit" value="Créer">
        </fieldset>
    </form>


