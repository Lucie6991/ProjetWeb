function clic_plus(){
    var quantite = document.getElementById("quantite");
    var qte = parseInt(quantite.value);
        qte = 1 + qte;
        quantite.value = qte;
}

function clic_moins(){
    var quantite = document.getElementById("quantite");
    var qte = parseInt(quantite.value);
    if (qte > 0){
        qte = qte - 1;
        quantite.value = qte;
    }
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