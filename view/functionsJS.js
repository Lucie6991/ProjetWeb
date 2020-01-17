function clic_plus(){
    var quantityProduct = document.getElementById("quantity").value;
    var quantite = document.getElementById("quantite");
    var qte = parseInt(quantite.value);
    if(qte<quantityProduct){
        qte = 1 + qte;
        quantite.value = qte;
    }
}

function clic_moins(){
    var quantite = document.getElementById("quantite");
    var qte = parseInt(quantite.value);
    if (qte > 0){
        qte = qte - 1;
        quantite.value = qte;
    }
}

function clic_plusA(){
    var quantite = document.getElementById("quantite");
    var qte = parseInt(quantite.value);
    qte = 1 + qte;
    quantite.value = qte;
}


function masquer_div(){
    var coche = document.getElementById("addLivraison").checked;
    if (coche)
    {
        document.getElementById("FormAMasquer").style.display = "block";
        document.getElementById("btnNewAdd").style.visibility = "hidden";
        document.getElementById("btnPayment").style.visibility = "hidden";

    }
    else
    {
        document.getElementById("FormAMasquer").style.display = "none";
        document.getElementById("btnNewAdd").style.visibility = "visible";
        document.getElementById("btnPayment").style.visibility = "visible";
    }
}

function pay() {
    var cocheC = document.getElementById("cheque").checked;
    var cocheP = document.getElementById("paypal").checked;
    if (cocheC){
        document.getElementById("chequeAmasquer").style.visibility = "visible";
        document.getElementById("paypalAmasquer").style.visibility = "hidden";
    }
    if (cocheP){
        document.getElementById("paypalAmasquer").style.visibility = "visible";
        document.getElementById("chequeAmasquer").style.visibility = "hidden";
    }
}

function bill() {
    document.getElementById("confirmer").style.visibility = "visible";
}