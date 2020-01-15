
<div class="container">
    <div class="row">

        <section class="col-lg-8">
            <h2>Bienvenue sur ISIWEB4SHOP !</h2>
            <br/>
            <p>Un site gourmand pour régaler toutes les pupilles !</p>
            <p>Cliquez sur la liste de gauche pour découvrir nos offres ! <br> </p>
        </section>
    </div>
            <h3> Quelques suggestions de produits: </h3>
            <div class="row">
                <?php

                foreach ($tab_product as $ligne){
                    $nom = $ligne->getName();
                    $description = $ligne->getDescription();
                    $image = $ligne->getImage();
                    $prix = $ligne->getPrice();
                    $prixHT = $prix/1.2;
                    $id = $ligne->getId();
                    $catID = $ligne->getCatId();
                    $quantity = $ligne->getQuantity();
                }?>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <?php
                    $tab_product = Product::getAllProducts();
                    for ($i=0;$i<3;$i++) {
                        if($id+$i >= count($tab_product) ){
                            $image= $tab_product[$id+$i-10]->getImage();
                            $id_prod = $id+$i-8;
                        }
                        else{
                            $image= $tab_product[$id+$i]->getImage();
                            $id_prod = $id+$i+2;
                        }
                        echo "<div class='col-lg-3'>";
                        echo "<a href='?action=read&id=".$id_prod."'><img class ='image_produit_consult'  src='view/images/$image' > </a>";
                        echo "</div>";
                    }
                    ?>
            </div>
