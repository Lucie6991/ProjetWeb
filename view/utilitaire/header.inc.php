<header>
    <div class="row">
        <div class="web4shop">
            <img src="view/images/Web4ShopHeader.png">
        </div>
        <?php if(empty($_SESSION["admin"])){?>
            <div class="entete">
                <a href="?action=readCategories" class='btn btn-info'></span> Retour à l'accueil</button></a>
                <a href='?action=seeCart' class='btn btn-info'> <span class='glyphicon glyphicon-gift'></span> Mon panier</button></a>
            </div>
        <?php }?>
    </div>
</header>