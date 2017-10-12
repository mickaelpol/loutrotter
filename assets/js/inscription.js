$(document).ready(function () {

    var inscription = $('#inscription');
    var nom = $('#nom');
    var prenom = $('#prenom');
    var mail = $('#email');
    var mail2 = $('#emailVerif');
    var pwd = $('#password');
    var pwd2 = $('#passwordVerif');
    var textErr = $('#textError');
    var textMdp = $('.textMdp');
    var egalMdp = $('.egalMdp');

    // fonction verifiant si l'input n'est pas vide
    function testInput(input) {
        if (input.val() === "") {
            input.parent().addClass("has-error");
            textErr.html('Remplissez les champs surlignés rouges');
            return true;
        } else {
            input.parent().removeClass("has-error").addClass("has-success");
            textErr.html('');
            return false;
        }
    }

    // fonction verifiant la longueur du mot de passe
    function lengthMdp(input) {
        if (input.val().length < 8 || input.val().length > 20) {
            textMdp.html('<strong class="text-danger text-center">le mot de passe doit être compris entre 8 et 20 caractères</strong>');
            return true;
        } else {
            return false;
        }
    }


    inscription.submit(function (e) {

        
        
        // verifie si l'input est remplis
        if (testInput(nom)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(prenom)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(mail)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(mail2)) {
            e.preventDefault();
        }
        // verifie la longueur du mot de passe
        if (lengthMdp(pwd)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(pwd)) {
            e.preventDefault();
        }
        // verifie longueur du mot de passe de verification
        if (lengthMdp(pwd2)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(pwd2)) {
            e.preventDefault();
        }
        if (pwd.val() != pwd2.val()) {
            egalMdp.html('<strong class="text-danger text-center">les mots de passe doivent correspondrent</strong>')
            e.preventDefault();
        } else {
            console.log('super');
        }



    });

});