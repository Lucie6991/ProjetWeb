<?php
if (empty($_SESSION['username'])){ ?>
<form action="?action=addedCustomer" method="post">
    <fieldset>
        <legend>Renseigner les informations suivantes :</legend>
        <p>
            <label for="id_forname">Prenom</label> :
            <input type="text" name="forname" id="id_forname" required/>
        </p>
        <p>
            <label for="id_surname">Nom </label> :
            <input type="text" name="surname" id="id_surname" required/>
        </p>
        <p>
            <label for="id_add1">Adresse</label> :
            <input type="text" name="add1" id="id_add1" required/>
        </p>
        <p>
            <label for="id_add2">Complément d'adresse</label> :
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
        <label for="username">Login :</label>
        <input type="text" name="login" id="username" required />
        <p></p>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required />
        <p></p>
        <input type="submit" value="Créer">
    </fieldset>
</form>
<?php
}

else {
    echo "<p> Vous ne pouvez pas créer de compte actuellement car vous êtes déjà connecté avec un compte. <br/> Deconnectez-vous !</p>";
}
?>