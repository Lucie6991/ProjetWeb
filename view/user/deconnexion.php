<?php
echo $_SESSION['customer_id'];
echo $_SESSION['username'];
    echo "Vous êtes déconnecté de votre compte<br>";
    echo "<a href='../view/user/home.php'>Accueil</a><br>";
    echo "<a href='?action=connect' class='seConnecter'>Se connecter</a><br>";
    echo "<a href='?action=add' class='AjoutClient'>Créer un compte</a><br>";
?>
