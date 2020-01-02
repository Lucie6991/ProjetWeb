<?php

$log=$_POST['login'];
$tab_log=Login::readLogin($log);

//var_dump($tab_log);
foreach ($tab_log as $ligne){
    $id = $ligne['id'];
    $customId = $ligne['customer_id'];
    $login = $ligne['username'];
    $mdp = $ligne['password'];

    echo "Bonjour " .$login;
    echo "<br />";
    echo "Votre identifiant client est : " . $customId;
}

?>
