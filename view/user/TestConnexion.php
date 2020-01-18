<?php

foreach ($tab_log as $ligne){
    $id = $ligne->getId();
    $customId = $ligne->getCustomerid();
    $login = $ligne->getLogin();
    $mdp = $ligne->getMdp();

}

foreach($customer as $ligne){
    $forname = $ligne->get('forname');
    $surname = $ligne->get('surname');

    echo "<h3>Bonjour " . $forname. " ". $surname. " !</h3>";
    echo "<br />";
    echo "Vous êtes bien connecté. <br> Vous pouvez maintenant procéder à vos achats et accéder à vos informations en cliquant, dans le menu, sur <strong>Mon Compte</strong>. ";
}

foreach($admin as $ligne){
    $username = $ligne->getUsername();
    $id = $ligne->getId();
    echo "<h3>Bonjour " . $username." ! </h3>";
    echo "<br />";
    echo "Vous êtes connecté en tant qu'administrateur. <br> 
        Vous avez la possibilité d'accéder à toutes les options de ce statut en cliquant, dans le menu, sur <strong>Session Admin</strong>.  ";

}
?>