<?php
if (!empty($_SESSION['customer_id'])) {
    echo "<h3>Votre adresse de facturation</h3>";

    foreach ($tab_adress as $ligne) :
        $prenom = $ligne->get('forname');
        $nom = $ligne->get('surname');
        $add1 = $ligne->get('add1');
        $add2 = $ligne->get('add2');
        $city = $ligne->get('add3');
        $postcode = $ligne->get('postcode');
        $phone = $ligne->get('phone');
        $email = $ligne->get('email');?>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="FormConnexion">
            <label name='CoordLabel'>  Identité : </label>
        <?php echo $nom . " " . $prenom;?>
        <br/>
        <label name='CoordLabel'>  Adresse : </label>
        <?php echo $add1; ?>
        <?php if (!empty($add2))
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$add2;?>
        <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$postcode . " " . $city;?><br>
        <label name='CoordLabel'>  Téléphone : </label>
        <?php echo $phone;?><br>
        <label name='CoordLabel'>  Email : </label>
        <?php echo $email;?>
        </div>
    </div>
</div>
<?php endforeach ;}?>
<br>
<div class="alert alert-info">
    <strong>Info!</strong> Si vous décidez de passer au paiement, l'adresse de facturation sera prise en compte comme étant celle de la livraison. <br/>
    Si vous ne voulez pas que ce soit le cas, merci de cocher la case qui suit.
</div>

<input type="checkbox" name="choixAddLivraison" id="addLivraison" onclick="masquer_div();">
<label name="Livraison">Choisir une adresse différente pour la livraison</label>
<br/><br/>
<a class='btn btn-success btnAdress' id="btnNewAdd" href="?action=newAdressFact">  Nouvelle adresse de facturation</a>
<br/><br/>
<a class='btn btn-success btnAdress' id="btnPayment" href='?action=sameAdd'>  Passer au paiement</a>

<div id="FormAMasquer" class="FormOpt">
    <form method="post" action="?action=addLivDiff">
        <fieldset>
            <legend>Renseigner une adresse de livraison:</legend>
            <p>
                <label for="id_firstname">Prenom</label> :
                <input type="text" name="firstname" id="id_firstname" required/>
            </p>
            <p>
                <label for="id_lastname">Nom </label> :
                <input type="text" name="lastname" id="id_lastname" required/>
            </p>
            <p>
                <label for="id_add1">Adresse 1</label> :
                <input type="text" name="add1" id="id_add1" required/>
            </p>
            <p>
                <label for="id_add2">Adresse 2</label> :
                <input type="text" name="add2" id="id_add2" />
            </p>
            <p>
                <label for="id_city">Ville</label> :
                <input type="text" name="city" id="id_city" required/>
            </p>
            <p>
                <label for="id_postcode">Code Postal</label> :
                <input type="text" name="postcode" id="id_postcode" required/>
            </p>
            <p>
                <label for="id_phone">Numéro de téléphone</label> :
                <input type="text" name="phone" id="id_phone" required/>
            </p>
            <p>
                <label for="id_email">Email</label> :
                <input type="email" name="email" id="id_email" required/>
            </p>
            <p>
                <input type="submit" value="Payer">
            </p>
        </fieldset>
    </form>
</div>
