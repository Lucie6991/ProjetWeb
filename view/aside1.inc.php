<?php
require_once ('../model/Categorie.php');
//require_once ('../index.php');
//$path= File::build_path(array('index.php'));

//Ligne de code chelou ??
$mesCategories=Categorie::getToutesLesCategories();

echo "<aside>";
foreach ($mesCategories as $ligne) {
    $id = $ligne['id'];
    $nom = $ligne['name'];
    echo "<li> <a href='produits.php?categ=".$id."'>$nom </a> </li>";
}
echo"</aside>";