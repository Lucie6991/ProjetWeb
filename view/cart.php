<?php
if (empty($_SESSION['cart'])){
    echo "<h3> Votre panier est vide</h3>";
}
else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th> Nom </th>";
    echo "<th> Prix</th>";
    echo "</tr>";
    for($i=0; $i<count($_SESSION['cart']); $i++){
        //echo "Vous avez au panier l'ID ";
        $id= $_SESSION['cart'][$i][0];
        //echo $id;
        $tab_prod = Product::getProduit($id);
        //var_dump($tab_prod);
        echo "<tr>";
        echo "<td>". $tab_prod[0]->getName()." </td>";
        echo "<td>". $tab_prod[0]->getPrice()." </td>";
        echo "</tr>";
    }
    echo "</table>";
}