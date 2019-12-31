<?php
$path= File::build_path(array('model','Product.php'));
require_once ($path);
$path3= File::build_path(array('model','Categorie.php'));
require_once ($path3);

$path5= File::build_path(array('model','Review.php'));
require_once ($path5);

class controllerProduct
{
    // Lecture de tous les produits
    public static function readAllProducts (){
        $controller='product';  // ne sert a rien pour le moment et va servir si on ajoute un sous-dossier dans view
        $view='testReadProduits';
        $page_title='Liste des Produits';
        $mesProduits = Product::getAllProducts();
        $path2= File::build_path(array('view','view.php'));
        require ($path2);
    }

    // Lecture de tous les produits d'une catégorie
    public static function readProductsCat (){
        $controller='product';
        $view='produits';
        $page_title='Liste des produits d\'une catégorie';
        if (isset ($_GET['categ'])){
            $id_cat = $_GET['categ'];
        }
        // faire un else
        $tab_productsCat = Product::getAllProductsCat($id_cat);
        if (empty ($tab_productsCat)){
            $path2 = File::build_path(array('view','error.php'));   //eroor car ca veut dire il n'y a pas de produit
        }
        else{
            $path2 = File::build_path(array('view','view.php'));
        }
        require_once ($path2);
    }

    //Lecture d'un produit identifié par son id
    public static function read(){
        $view='choixPanier';
        $page_title='Le choix de votre panier';
        $id_product = $_GET['id'];
        $product = new Product();
        $tab_product = $product->getProduit($id_product);
        $tab_review = Review::getReviewProduct($id_product);
        if (empty ($tab_product)){
            $path2 = File::build_path(array('view','error.php'));
        }
        else{
            $path2 = File::build_path(array('view','view.php'));
        }
        require_once ($path2);
    }

    // Lecture de toutes les catégories
    public static function readCategories (){
        $controller='categorie';
        $view='home';
        $page_title='Liste des Catégories';
        $lesCategories = Categorie::getAllCategories();
        $path2= File::build_path(array('view','view.php'));
        require ($path2);

    }

}
?>