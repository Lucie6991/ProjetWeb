<?php
echo $_SESSION['customer_id'];
echo $_SESSION['username'];
    echo "<h4>Vous êtes déconnecté de votre compte !</h4><br>";
    echo "<a href='?action=readCategories' class='btn btn-success btnAdress'>Accueil</a><br>";
    echo "<a href='?action=connect' class='btn btn-success btnAdress'>Se connecter</a><br>";
    echo "<a href='?action=add' class='btn btn-success btnAdress'>Créer un compte</a><br>";
?>
