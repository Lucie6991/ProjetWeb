<h1>Erreur de connexion</h1>
<?php if (empty ($username) && !empty($password)) {?>
    <p>Le nom d'utilisateur n'est pas correct</p><br/>
    <a href='?action=connect' class='seConnecter'>Recommencer</a><br>
<?php }
if (empty ($password) && !empty($username)) {?>
    <p>Le mot de passe n'est pas correct </p><br/>
    <a href='?action=connect' class='seConnecter'>Recommencer</a><br>
<?php }
if (empty ($username) && empty($password)) { ?>
    <p>Vous n'êtes pas client chez nous !</p> <br/>
    <p>Créez-vous un compte gratuitement en cliquant sur le lien ci-joint :</p>
    <a href='?action=add' class='AjoutClient'>Créer un compte</a><br>
<?php } ?>