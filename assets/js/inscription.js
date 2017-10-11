$(document).ready(function(){

    var inscription = $('#inscription');
    var nom = $('#nom');
    var prenom = $('#prenom');
    var mail = $('#email');
    var mail2 = $('#emailVerif');
    var pwd = $('#password');
    var pwd2 = $('#passwordVerif');
    var errNom = $('#erreur1');
    var textErr = $('#textError');
    var errPrenom = $('#erreur2');

    function testInput(input){
        if (input.val() === "") {
            input.parent().addClass("has-error");
            return true;
        } else {
            input.parent().removeClass("has-error").addClass("has-success");
            return false;
        }
    }


    inscription.submit(function(e){

        if (testInput(nom)) {
            e.preventDefault();
        }
        
    });
    
});