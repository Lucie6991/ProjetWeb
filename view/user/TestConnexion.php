<?php

//var_dump($tab_log);
foreach ($tab_log as $ligne){
    $id = $ligne->getId();
    $customId = $ligne->getCustomerid();
    $login = $ligne->getLogin();
    $mdp = $ligne->getMdp();

}
foreach($customer as $ligne){
    $forname = $ligne->get('forname');
    $surname = $ligne->get('surname');
    echo "Bonjour " . $forname. " ". $surname;
    echo "<br />";
    echo "Votre identifiant client est : " . $customId;
    echo "<br/>";

    // Définition des variables de sessions
    //$_SESSION['customer_id'] = $customId;
}

foreach($admin as $ligne){
    $username = $ligne->getUsername();
    $id = $ligne->getId();
    echo "Bonjour " . $username;
    echo "<br />";

    $_SESSION['customer_id'] = $id;
}

?>