<h2>Choisissez votre moyen de paiement</h2>
<form action="?action=toPay" method="post">
    <div class="form-group">
        <div class="custom-control custom-radio">
            <input type="radio" value="cheque" id="cheque" name="paiement" class="custom-control-input"  onclick="pay();" checked>
            <label class="custom-control-label" for="cheque">Chèque</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" value="paypal" id="paypal" name="paiement" class="custom-control-input" onclick="pay();">
            <label class="custom-control-label" for="paypal">Paypal</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success"> Valider le paiement </button>
</form>
<br>
<div id="paypalAmasquer" class="paypalAmasquer">
    Voici le lien paypal :
    <a href="https://www.paypal.com/fr/home">Paypal</a>
</div>
<div id="chequeAmasquer" class="chequeAmasquer">
    <p>Voici nos coordonnées pour envoyer le chèque :</p>
    <div class="FormConnexion">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-2">
                <br>
                <span id="icon_contact" class="glyphicon glyphicon-home icon_contact"></span class">
            </div>
            <div class="col-lg-7">
                <p>Web4Shop By Agathe & Lucie</p>
                <p>17 boulevard André Latarjet </p>
                <p> 69100 VILLEURBANNE</p>
            </div>
        </div>
    </div>
</div>


