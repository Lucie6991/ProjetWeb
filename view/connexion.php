<h1>Se connecter</h1>
<?php
$view = "TestConnexion";
$page_title='Connecté';
?>
<form action="view/TestConnexion.php" method="post">
    <label for="champNom">Login :</label>
    <input type="text" name="login" id="champNom" required />
    <p></p>
    <label for="champMdp">Mot de passe :</label>
    <input type="password" name="mdp" id="champMdp" required />
    <p></p>
    <input type="submit" value="Connexion">
</form>
