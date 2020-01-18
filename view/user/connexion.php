
<div class="cnx">
    <form class="FormConnexion" action="?action=readCustomer" method="post">
        <h1>Se connecter</h1>

        <label for="username">Login :</label>
        <input type="text" name="login" id="username" required />
        <p></p>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required />
        <p></p>

        <input type="submit" id="connexion" value="Connexion"/>
        <a href="?action=pswForget" class="btn btn-warning" id='btn_detail'> Mot de passe oublié</a>

    </form>
</div>
