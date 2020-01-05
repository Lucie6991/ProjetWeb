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
        $controller = "user";
        $view='testReadProduits';
        $page_title='Liste des Produits';
        $message="";
        $mesProduits = Product::getAllProducts();
        $path2= File::build_path(array('view',$controller,'view.php'));
        require ($path2);
    }

    // Lecture de tous les produits d'une catégorie
    public static function readProductsCat (){
        $controller = "user";
        $view='produits';
        $page_title='Liste des produits d\'une catégorie';
        $message="";

        if (isset ($_GET['categ'])){
            $id_cat = $_GET['categ'];
        }
        // faire un else
        $tab_productsCat = Product::getAllProductsCat($id_cat);
        if (empty ($tab_productsCat)){
            $message="Il n'y a pas de produits dans cette catégories";
            $view='error';
            $path2 = File::build_path(array('view',$controller,'view.php'));   //eroor car ca veut dire il n'y a pas de produit
        }
        else{
            $path2 = File::build_path(array('view',$controller,'view.php'));
        }
        require_once ($path2);
    }

    //Lecture d'un produit identifié par son id
    public static function read(){
        $view='choixPanier';
        $page_title='Le choix de votre panier';
        $controller = "user";
        $message="";

        $id_product = $_GET['id'];
        $product = new Product();
        $tab_product = $product->getProduit($id_product);
        $tab_review = Review::getReviewProduct($id_product);
        if (empty ($tab_product)){
            $path2 = File::build_path(array('view',$controller,'error.php'));
        }
        else{
            $path2 = File::build_path(array('view',$controller,'view.php'));
        }
        require_once ($path2);
    }



    public static function addedProd(){
        if (isset($_POST["name"])){
            $name =$_POST["name"];
            $cat =$_POST["cat"];
            $desc =$_POST["desc"];
            $img =$_POST["image"];
            $price =$_POST["price"];
            $qte = $_POST["qte"];
            Product::addProduct($cat,$name,$desc,$img,$price,$qte);
        }
        $view='addedProd';
        $controller="admin";
        $page_title='Produit ajouté';
        $message="";
        $path2 = File::build_path(array('view',$controller,'viewAdmin.php'));
        require ($path2);
    }

}
?>