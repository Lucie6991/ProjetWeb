<?php
foreach ($unUtilisateur as $ligne) {
    $nom = $ligne->getSurname();
    $prenom = $ligne->getForname();
}
echo "Bonjour " .$prenom. " " .$nom;
?>
