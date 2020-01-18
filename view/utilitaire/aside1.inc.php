<?php
$lesCategories = Categorie::getAllCategories();?>
<aside class='col-lg-3'>

    <?php if (!empty($_SESSION['username'])){
        echo "<br><strong><center>Bonjour ". $_SESSION['username']."</strong></center>";
    }?>

    <h3 class='textePanier'> Découvrez nos produits par catégorie : </h3>
    <?php foreach ($lesCategories as $ligne) {
        $id = $ligne->getId();
        $nom = $ligne->getName();
        echo "<a class='btn btn-info btnAside' href='?categ=".$id."&action=readProductsCat'>Nos $nom </a><br>";
    }?>

    <br>
    <div class='trait'></div>
    <h3 class='textePanier'> Espace adhérent : </h3>
    <?php // on affiche que si personne n'est connecté
    if (empty($_SESSION['username']) && empty($_SESSION["admin"])){?>
        <a href='?action=connect' class='btn btn-info btnAside''>Se connecter</a><br>
    <?php } ?>
    <a href='?action=add' class='btn btn-info btnAside'>Créer un compte</a><br>

    <?php // on affiche que si un user ou admin est connecté
    if (!empty($_SESSION['username']) || !empty($_SESSION["admin"])) { ?>
        <a href='?action=deconnect' class='btn btn-info btnAside'>Se déconnecter</a><br>
    <?php }
    // on affiche seulement pour l'admin
    if (!empty($_SESSION['admin'])){ ?>
        <a href='?action=readAllOrders' class='btn btn-info btnAside'> Session Admin</a>
    <?php }
    // on affiche seulement pour un utilisateur
    if (!empty($_SESSION['username']) && empty($_SESSION['admin'])){ ?>
        <a href='?action=myAccount' class='btn btn-info btnAside'> Mon compte</a>
    <?php }?>
    <br>
    <div class='trait'></div>
    <h3 class='textePanier'> Le groupe Web4Shop: </h3>
    <a href='?action=us' class='btn btn-info btnAside'> Qui sommes-nous ?</a><br>
    <a href='?action=contact' class='btn btn-info btnAside'> Nous contacter</a><br>
    <a href='?action=recrut' class='btn btn-info btnAside'> Nous rejoindre</a><br>
    <br>
</aside>