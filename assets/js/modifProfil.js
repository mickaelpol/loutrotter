$(document).ready(function(){

	// Envoi des deux Formulaires
	var envoiForm = $('#modifProfil');
	var envoiMdp = $('#modifPassword');

///////////////////////////////////////////////////////////////////

	// stockage des inputs du 1er formulaire (nom prénom email)
	var nom = $('#nom');
	var prenom = $('#prenom');
	var email = $('#email');

	// stockage des erreur du 1 er formulaire
	var erreurNom = $('#erreurNom');
	var erreurPrenom = $('#erreurPrenom');
	var erreurMail = $('#erreurMail');

/////////////////////////////////////////////////////////////////////

	// sotckage des input du 2nd formulaire (Mot de passe)
	var mdp = $('#password');
	var VerifMdp = $('#passwordVerif');

///////////// stockage des erreurs des inputs vide mot de passe
	var erreurMdp  = $('#erreurPassword');
	var erreurMdpVerif = $('#erreurPasswordVerif');

//////////// stockage erreur de correspondance de mot de passe //////
	var erreurCorresMdp = $('#erreurCorrespond');
	var erreurCorresMdp2 = $('#erreurCorrespond2');

/////////// stockage erreur longueur du mot de passe ////////////////
	var infMdp = $('#erreurInf');
	var infMdp2 = $('#erreurInf2');


/////////////////////////////////////////////////////////////////////


////////////// Fonction verifiante des inputs ///////////////////////

	function testInput(input, valeur, emplacement) {
		if (input.val() === "") {
			input.parent().addClass("has-error");
			emplacement.html('Le champ ' + valeur + ' est vide');
			return true;
		} else {
			input.parent().removeClass("has-error").addClass("has-success");
			emplacement.html('');
			return false;
		}
	}


/////////// Fonction verifiant la correspondance des mot de passe /////
	function mdpCorrespond(mdp, mdp2, emplacement, valeur, valeur2){

		if (mdp.val() != mdp2.val()) {
			mdp.parent().addClass("has-error");
			mdp2.parent().addClass("has-error");
			emplacement.html('Le champ ' + valeur + ' ne correspond pas au champ ' + valeur2);
			return true;

		} else {
			mdp.parent().removeClass("has-error").addClass("has-success");
			emplacement.html('');
			return false;
		}
	}

	function mdpCorrespond2(mdp, mdp2, emplacement2, valeur, valeur2){

		if (mdp.val() != mdp2.val()) {
			mdp.parent().addClass("has-error");
			mdp2.parent().addClass("has-error");
			emplacement2.html('Le champ ' + valeur + ' ne correspond pas au champ ' + valeur2);
			return true;

		} else {
			mdp2.parent().removeClass("has-error").addClass("has-success");
			emplacement2.html('');
			return false;
		}
	}

/////// Fonction qui verifie que le 1er mot de passe soit supérieur a 8 caractères ///////
	function longueurMdp1(mdp, emplacement, valeur){

		if (mdp.val().length < 8) {
			mdp.parent().addClass("has-error");
			emplacement.html('Le champ ' + valeur + ' doit être supérieur à 8 caractères');
			return true;
		} else {
			// mdp.parent().removeClass("has-error").addClass("has-success");
			emplacement.html('');
			return false;
		}
	}

/////// Fonction qui verifie que le 2nd mot de passe soit supérieur à 8 caractères ///////
	function longueurMdp2(mdp2, emplacement2, valeur2){

		if (mdp2.val().length < 8) {
			mdp2.parent().addClass("has-error");
			emplacement2.html('Le champ ' + valeur2 + ' doit être supérieur à 8 caractères');
			return true;
		} else {
			// mdp2.parent().removeClass("has-error").addClass("has-success");
			emplacement2.html('');
			return false;
		}
	}


//////////////// Verification du formulaire Nom Prenom Email ///////////

	envoiForm.submit(function(e){

		if (testInput(nom, "Nom", erreurNom)) {
			e.preventDefault();
		}

		if (testInput(prenom, "Prenom", erreurPrenom)) {
			e.preventDefault();
		}

		if (testInput(email, "Email", erreurMail)) {
			e.preventDefault();
		}

	});

////////// Verification du formulaire Chnagement de mot de passe ////////

	envoiMdp.submit(function(e){

	////////////////// Verification des inputs si vide //////////////////////

		if (testInput(mdp, "Mot de passe", erreurMdp)) {
			e.preventDefault();
		}

		if (testInput(VerifMdp, "Verification du mot de passe", erreurMdpVerif)) {
			e.preventDefault();
		}

		//////////////// Verification de la correspondance des deux mot de passe //////////

		if (mdpCorrespond(mdp, VerifMdp, erreurCorresMdp, "Mot de passe", "Verification du mot de passe")) {
			e.preventDefault();
		}

		if (mdpCorrespond2(VerifMdp, mdp, erreurCorresMdp2, "Verification du mot de passe", "Mot de passe")) {
			e.preventDefault();
		}

		/////////////// Verification De la longueur du mot de passe ////////////////////////
		if (longueurMdp1(mdp, infMdp, " Mot de passe ")) {
			e.preventDefault();
		}

		if (longueurMdp2(VerifMdp, infMdp2, " Verification du mot de passe ")) {
			e.preventDefault();
		}


	});



});
