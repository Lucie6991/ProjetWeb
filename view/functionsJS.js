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
