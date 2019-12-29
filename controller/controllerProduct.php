<?php
/*$path= File::build_path(array('model','Product.php'));
require_once ($path);
*/
require_once ('../model/Product.php');

class controllerProduct
{
    // Lecture de tous les produits
    public static function readProduits (){
        $controller='product';
        $view='produits';
        $page_title='Liste des Produits';
        $mesProduits = Product::getTousLesProduits();
        require_once ('../view/view.php');
       /* $path2= File::build_path(array('view','view.php'));
        require ($path2);*/
    }

    // Lecture de tous les produits d'un catégorie
    public static function readProduitsCat (){
        $controller='product';
        $view='produits';
        $page_title='Liste des Produits d\'une catégorie';
        $id_cat = $_POST['id_cat'];
        $productsCat = new Product();
        $tab_productsCat = $productsCat->getTousLesProduitsDeLaCat($id_cat);
        if (empty ($tab_productsCat)){
            require_once ('../view/error.php');
        }
        require_once ('../view/produits.php');
    }


    //Lecture d'un produit identifié par son id
    public static function read(){
        $id_product = $_GET['id_Produit'];
        $product = new Product();
        $tab_product = $product->getProduit($id_product);
        if (empty ($tab_product)){
            require_once ('../view/error.php');
        }
        require_once ('../view/choixPanier.php');
    }
}
?>