<form method="post" action="testAjoutAdress.php">
    <fieldset>
        <legend>Renseigner une adresse de Livraison :</legend>
        <p>
            <label for="id_firstname">Prenom</label> :
            <input type="text" name="firstname" id="id_firstanme" required/>
        </p>
        <p>
            <label for="id_lastname">Nom </label> :
            <input type="text" name="firstname" id="id_firstanme" required/>
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
            <input type="text" name="add1" id="id_add1" required/>
        </p>
        <p>
            <label for="id_phone">Numéro de téléphone</label> :
            <input type="text" name="phone" id="id_phone" required/>
        </p>
        <p>
            <label for="id_email">Email</label> :
            <input type="text" name="email" id="id_email" required/>
        </p>
        <p>
            <input type="submit" value="Valider"/>
        </p>
    </fieldset>
</form>
