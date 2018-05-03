function Validation() {
    //alert("js");
    document.formulaire.submit();    
}
//-------------------------------------------

function controle(formulaire, var1, var2) {
    erreur = 0;
    if (formulaire.name == "form4") {
        if (!(formulaire.choix[0].checked) && !(form4.choix[1].checked)) {
            alert(" Merci de faire un choix !!!");
            erreur = 1;
        }
    }
    if (!(var1.value && var2.value)) {
        alert("Attention un champ est vide");
        erreur = 1;
    }
    if (erreur == 0) formulaire.submit();
}
//-------------------------------------------

jQuery(document).ready(function() {
    $('#ville').autocomplete({
        source: "controleurAjax.php?champ=ville", // variable transmise 'term' à récupérer avec $GET['term']
        minLength: 1,

    }); //fin ville

}); // fin ready