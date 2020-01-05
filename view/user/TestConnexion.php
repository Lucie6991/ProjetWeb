<?php

//var_dump($tab_log);
foreach ($tab_log as $ligne){
    $id = $ligne['id'];
    $customId = $ligne['customer_id'];
    $login = $ligne['username'];
    $mdp = $ligne['password'];

}
foreach($customer as $ligne){
    $forname = $ligne['forname'];
    $surname = $ligne['surname'];
    echo "Bonjour " . $forname. " ". $surname;
    echo "<br />";
    echo "Votre identifiant client est : " . $customId;
    echo "<br/>";

    // Définition des variables de sessions
    $_SESSION['customer_id'] = $customId;
    //echo $_SESSION['customer_id'];
}

foreach($admin as $ligne){
    $username = $ligne['username'];
    $id = $ligne['id'];
    echo "Bonjour " . $username;
    echo "<br />";

    $_SESSION['customer_id'] = $id;
}

?>