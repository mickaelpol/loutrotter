$(document).ready(function () {

//////// variable qui stocke l'envoi du formulaire ////////////////////
var inscription = $('#inscription');

//////// variable qui stocke les valeur des inputs ////////////////////
var nom = $('#nom');
var prenom = $('#prenom');
var mail = $('#email');
var mail2 = $('#emailVerif');
var pwd = $('#password');
var pwd2 = $('#passwordVerif');

/////// variable qui stocke les textes des erreurs ////////////////////
var egalEmail = $('#egalEmail');
var egalEmail2 = $('#egalEmail2');
var inputErr = $('#inputError');
var longMdp = $('#longMdp');
var longMdp2 = $('#longMdp2');
var egalMdp = $('#egalMdp');
var egalMdp2 = $('#egalMdp2');

    // fonction verifiant si l'input n'est pas vide
    function testInput(input, emplacement) {
        if (input.val() === "") {
            input.parent().addClass("has-error");
            emplacement.html('Remplissez les champs surlignés rouges');
            return true;
        } else {
            input.parent().removeClass("has-error").addClass("has-success");
            emplacement.html('');
            return false;
        }
    }

    // fonction verifiant la longueur du mot de passe
    function lengthMdp(mdp, mdp2, emplacement, emplacement2) {
        if (mdp.val().length < 8 || mdp.val().length > 20 || mdp2.val().length < 8 || mdp2.val().length > 20) {
            mdp.parent().addClass('has-error');
            mdp2.parent().addClass('has-error');
            emplacement.html('le mot de passe doit être compris entre 8 et 20 caractères');
            emplacement2.html('le mot de passe doit être compris entre 8 et 20 caractères');
            return true;
        } else {
            mdp.parent().removeClass('has-error').addClass('has-success');
            mdp2.parent().removeClass('has-error').addClass('has-success');
            emplacement.html('');
            emplacement2.html('');
            return false;
        }
    }

    //////// fonction verifiant que les deux email soit identique /////////
    function emailCorrespond(email, email2, valeur, valeur2){

        if (email.val() != email2.val() || email.val()=== "")  {
            email.parent().addClass("has-error");
            email2.parent().addClass("has-error");
            egalEmail.html('Le champ ' + valeur + ' ne correspond pas au champ ' + valeur2);
            egalEmail2.html('Le champ ' + valeur2 + ' ne correspond pas au champ ' + valeur);
            return true;

        } else {
            email.parent().removeClass("has-error").addClass("has-success");
            email2.parent().removeClass("has-error").addClass("has-success");
            emplacement.html('');
            emplacement2.html('');
            return false;
        }

    }




    /////// Fonction verifiant l'égalité des mots de passe ////////////////////
    function egaliteMdp(mdp, mdp2, valeur, valeur2){

        if (mdp.val() !== mdp2.val()) {
            mdp.parent().addClass('has-error');
            mdp2.parent().addClass('has-error');
            egalMdp.html('Le champ ' + valeur + ' ne correspond pas au champ ' + valeur2);
            egalMdp2.html('Le champ ' + valeur2 + ' ne correspond pas au champ ' + valeur);
            return true;

        } else {
            mdp.parent().removeClass('has-error').addClass('has-success');
            mdp2.parent().removeClass('has-error').addClass('has-success');
            emplacement.html('');
            emplacement2.html('');
            return false;
        }

    }



    inscription.submit(function (e) {



        // verifie si l'input est remplis
        if (testInput(nom, inputErr)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(prenom, inputErr)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(mail, inputErr)) {
            e.preventDefault();
        }
        // verifie si l'input est remplis
        if (testInput(mail2, inputErr)) {
            e.preventDefault();
        }
        // verifie que les deux mots de passe soit identique
        if (emailCorrespond(mail, mail2, egalEmail, egalEmail2, "Email", "Verification email")) {
            e.preventDefault();
        }

        // verifie si l'input est remplis
        if (testInput(pwd, inputErr)) {
            e.preventDefault();
        }

        // verifie si l'input est remplis
        if (testInput(pwd2, inputErr)) {
            e.preventDefault();
        }

        // verifie si les deux mots de passe soit égal
        if (egaliteMdp(pwd, pwd2, "Mot de passe", "Verification du mot de passe")) {
            e.preventDefault();
        }

        // verifie la longueur du mot de passe
        if (lengthMdp(pwd, pwd2, longMdp, longMdp2)) {
            e.preventDefault();
        }




    });

});
