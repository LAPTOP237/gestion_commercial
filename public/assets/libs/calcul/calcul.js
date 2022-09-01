// ---Calcul des Montants---

$("#PU").bind('keyup mouseup', function() {

    let PU = document.getElementById("PU").value;
    let Q = document.getElementById("quantite").value;
    let tva = document.getElementById("tauxTVA").value;
    let remise = 0 ;
    if ( document.getElementById("remise")) {
        remise = document.getElementById("remise").value
    } 
    let montantHT = Q * PU;
    let montantTTC = montantHT + ((montantHT * tva) / 100) - remise;
    $("#montantHT").val(Math.round(montantHT));
    $("#montantTTC").val(Math.round(montantTTC));

});

$("#tauxTVA").bind('keyup mouseup', function() {

    let PU = document.getElementById("PU").value;
    let Q = document.getElementById("quantite").value;
    let tva = document.getElementById("tauxTVA").value;
    let remise = 0 ;
    if ( document.getElementById("remise")) {
        remise = document.getElementById("remise").value
    } 
    let montantHT = Q * PU;
    let montantTTC = montantHT + ((montantHT * tva) / 100) - remise;
    $("#montantHT").val(Math.round(montantHT));
    $("#montantTTC").val(Math.round(montantTTC));

});

$("#quantite").bind('keyup mouseup', function() {

    let PU = document.getElementById("PU").value;
    let Q = document.getElementById("quantite").value;
    let tva = document.getElementById("tauxTVA").value;
    let remise = 0 ;
    if ( document.getElementById("remise")) {
        remise = document.getElementById("remise").value
    } 
    let montantHT = Q * PU;
    let montantTTC = montantHT + ((montantHT * tva) / 100) - remise;
    $("#montantHT").val(Math.round(montantHT));
    $("#montantTTC").val(Math.round(montantTTC));

});

$("#remise").bind('keyup mouseup', function() {

    let PU = document.getElementById("PU").value;
    let Q = document.getElementById("quantite").value;
    let tva = document.getElementById("tauxTVA").value;
    let remise = 0 ;
    if ( document.getElementById("remise")) {
        remise = document.getElementById("remise").value
    } 
    let montantHT = Q * PU;
    let montantTTC = montantHT + ((montantHT * tva) / 100) - remise;
    $("#montantHT").val(Math.round(montantHT));
    $("#montantTTC").val(Math.round(montantTTC));

});

// --- Calcul des Montants ---