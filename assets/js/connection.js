$(document).ready(function(){

	var connection = $('#connection');
	var email = $('#email');
	var pwd = $('#password');
	var textErr = $('#textError');
	var erreur1 = $('#erreur1');
	var erreur2 = $('#erreur2');

	// fonction verifiant si l'input n'est pas vide
	function testInput(input, valeur, emplacement) {
		if (input.val() === "") {
			input.parent().addClass("has-error");
			emplacement.html('<u class="text-danger">Le champ ' + valeur + ' est vide</u>');
			return true;
		} else {
			input.parent().removeClass("has-error").addClass("has-success");
			emplacement.html('');
			return false;
		}
	}

	connection.submit(function(e){

		if (testInput(email, "email", erreur1)) {
			e.preventDefault();
		}
		if (testInput(pwd, "mot de passe", erreur2)) {
			e.preventDefault();
		}
	});

});