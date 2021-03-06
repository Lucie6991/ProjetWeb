
<?php if (empty($_SESSION['username'])){ ?>
<form method="post" action="?action=addLivDiff">
    <div class="alert alert-info">
        <strong>Info!</strong> Votre adresse de facturation et de livraison seront les mêmes. Si vous souhaitez en avoir deux adresses différentes, veuillez
        vous créer un compte.
    </div>
    <?php }
    else { ?>
    <form method="post" action="?action=addAdrFact">
        <?php } ?>
        <fieldset>
            <legend>Renseigner une adresse :</legend>
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
                <input type="submit" value="Valider"/>
            </p>
        </fieldset>
    </form>
