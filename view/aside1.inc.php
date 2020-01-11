<?php
$lesCategories = Categorie::getAllCategories();

echo "<aside class='col-lg-3'>";
if (!empty($_SESSION['username'])){
    echo "Bonjour ". $_SESSION['username'];
    echo "<br/>";
}
echo "<h3 class='textePanier'> Découvrez nos produits par catégorie : </h3>";
foreach ($lesCategories as $ligne) {
    $id = $ligne->getId();
    $nom = $ligne->getName();
    echo "<a class='btn btn-info btnAside' href='?categ=".$id."&action=readProductsCat'>Nos $nom </a><br>";
}

echo "<br>";
echo "<div class='trait'></div>";

echo "<h3 class='textePanier'> Espace adhérent : </h3>";

//echo $_SESSION['customer_id']. "<br/>";
if (empty($_SESSION['username'])){
    echo "<a href='?action=connect' class='btn btn-info btnAside''>Se connecter</a><br>";
}

echo "<a href='?action=add' class='btn btn-info btnAside'>Créer un compte</a><br>";

echo "<a href='?action=deconnect' class='btn btn-info btnAside'>Se déconnecter</a><br>";
//echo $_SESSION['admin'];


if (!empty($_SESSION['admin'])){
    echo "<a href='?action=readAllOrders' class='btn btn-info btnAside'> Session Admin</a>";
}
echo "<br>";
echo "<div class='trait'></div>";
echo "<h3 class='textePanier'> Le groupe Web4Shop: </h3>";
echo "<a href='?action=contact' class='btn btn-info btnAside'> Nous contacter</a><br>";
echo "<a href='?action=recrut' class='btn btn-info btnAside'> Nous rejoindre</a><br>";
echo "<br>";
echo"</aside>";