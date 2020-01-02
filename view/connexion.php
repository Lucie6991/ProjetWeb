<?php
$view = "TestConnexion";
$page_title='Connecté';
?>
<div class="cnx">
    <form class="FormConnexion" action="?action=readLogin" method="post">
        <h1>Se connecter</h1>

        <label for="champNom">Login :</label>
        <input type="text" name="login" id="username" required />
        <p></p>

        <label for="champMdp">Mot de passe :</label>
        <input type="password" name="mdp" id="password" required />
        <p></p>

        <input type="submit" id="connexion" value="Connexion"/>
        <input type="hidden" name="action" value="readLogin"/>
    </form>
</div>
