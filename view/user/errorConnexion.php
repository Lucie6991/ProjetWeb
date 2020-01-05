<?php
echo "<h1>Erreur de connexion</h1>";

if (empty ($username) && !empty($password))
{
    echo "Le nom d'utilisateur n'est pas correct";
    echo"<br/>";
    echo "<a href='?action=connect' class='seConnecter'>Recommencer</a><br>";

}
if (empty ($password) && !empty($username))
{
    echo "Le mot de passe n'est pas correct";
    echo"<br/>";
    echo "<a href='?action=connect' class='seConnecter'>Recommencer</a><br>";
}
if (empty ($username) && empty($password))
{
    echo "Vous n'êtes pas client chez nous ! <br/>";
    echo "Créez-vous un compte gratuitement en cliquant sur le lien ci-joint :";
    echo "<a href='?action=add' class='AjoutClient'>Créer un compte</a><br>";
}

?>