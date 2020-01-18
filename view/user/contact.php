<?php
if (isset($retour))
    echo "<h3 class='gratuit' >$retour </h3>";
?>

<h1 > Où nous trouver ? </h1>
<div class="FormConnexion">
    <div class="row">
        <div class="col-lg-4">
            <p>17 boulevard André Latarjet </p>
            <p> 69100 VILLEURBANNE</p>
            <span id="icon_contact" class="glyphicon glyphicon-home icon_contact"></span>
        </div>
        <div class="col-lg-4">
            <p>04 77 15 20 32 </p>
            <p>06 82 15 85 71 </p>
            <span style="font-size: 30px; margin-left: 40px;" class="glyphicon glyphicon-earphone"></span>
        </div>
        <div class="col-lg-4">
            <p style="color: white"> hello world</p>
            <p> <a href="mailto:contact@web4shop.fr"> contact@web4shop.fr </a> </p>
            <span style="font-size: 30px; margin-left: 50px;" class="glyphicon glyphicon-envelope"></span>
        </div>
    </div>
</div>
<h1 > Envoyez nous un message : </h1>
<form class="FormConnexion" action="?action=contact" method="post">
    <label for="champNom"> Votre email</label>
    <input type="text" name="nom" id="email" required />
    <p></p>

    <label for="objet">Objet</label>
    <input type="text" name="objet" id="objet" required />
    <p></p>
    <label for="message">Votre message</label>
    <textarea type="text" name="message" id="message" placeholder="Votre message ici ..."></textarea>
    <input type="submit"  value="Envoyer le message" required/>
</form>


