<?php
//require_once('../model/Categorie.php');
//require_once ('../index.php');
//$path= File::build_path(array('model','categorie.php'));
//require_once ($path);

$lesCategories = Categorie::getAllCategories();
echo "<aside class='col-lg-3'>";
foreach ($lesCategories as $ligne) {
    $id = $ligne->getId();
    $nom = $ligne->getName();
    echo "<li> <a href='?categ=".$id."&action=readProductsCat'>$nom </a> </li>";
}
echo"</aside>";