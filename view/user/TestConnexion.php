<?php
foreach ($tab_log as $ligne){
    $id = $ligne["id"];
    $customId = $ligne["customer_id"];
    $login = $ligne["username"];
    $mdp = $ligne["password"];

    echo "Bonjour " .$login;
    echo "<br />";
    echo "Votre identifiant client est : " . $customId;
}

?>
