<?php

//var_dump($tab_log);
foreach ($tab_log as $ligne){
    $id = $ligne['id'];
    $customId = $ligne['customer_id'];
    $login = $ligne['username'];
    $mdp = $ligne['password'];

    // Définition des variables de sessions
    $_SESSION['username'] = $login;
    $_SESSION['customer_id'] = $customId;

}
 foreach($customer as $ligne){
     $forname = $ligne['forname'];
     $surname = $ligne['surname'];
     echo "Bonjour " . $forname. " ". $surname;
     echo "<br />";
     echo "Votre identifiant client est : " . $customId;
     echo "<br/>";
 }

?>