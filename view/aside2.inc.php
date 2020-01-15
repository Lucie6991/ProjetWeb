<aside class='col-lg-3'>
    <br>

    <h3 class='textePanier'> Espace Commande : </h3>
    <a href='?action=readAllOrders' class='btn btn-info btnAsideAdmin'> Voir les commandes </a><br>
    <a href='?action=seeOrdersByChecks' class='btn btn-info btnAsideAdmin'> Valider reception chèque </a><br>

    <div class='trait'></div>
    <h3 class='textePanier'> Espace Magasin : </h3>
    <a href='?action=addNewCat' class='btn btn-info btnAsideAdmin'> Ajouter une catégorie </a><br>
    <a href='?action=addNewProduct' class='btn btn-info btnAsideAdmin'> Ajouter un produit </a><br>
    <a href='?action=addStock' class='btn btn-info btnAsideAdmin'> Ajouter du stock à un produit </a><br>

    <div class='trait'></div>
    <h3 class='textePanier'> Espace Admin : </h3>
    <a href='?action=readCategories' class='btn btn-info btnAsideAdmin'> Retour en tant qu'utilisateur</a><br>
    <a href='?action=addAdmin' class='btn btn-info btnAsideAdmin'> Ajouter un admin</a><br>
    <?php
    if (!empty($_SESSION["admin"])) { ?>
        <a href='?action=deconnect' class='btn btn-info btnAsideAdmin'>Se déconnecter</a><br>
    <?php } ?>

</aside>