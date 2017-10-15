<?php 

//  fonction verifiant si la valeurs des inputs n'est pas vide
function testInput($fichier){
	if(empty($_POST[$fichier]));
	return  $fichier;
}

if (isset($_POST['validForm'])) {

	$erreurMessage = testInput("Les champs doivent être remplis");

	header('refresh:3;url=?p=profil');
	$loader = "<div class='container'>
	<div class='row'>
		<div id='loading' class='loader'></div>
	</div>
</div>";


if (!empty($_POST['nom']) & !empty($_POST['prenom']) & !empty($_POST['email'])) {

	$erreurMessage = "";

	$nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
	$prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);

	$update = sprintf("UPDATE uti_utilisateur SET uti_nom='%s', uti_prenom='%s', uti_mail='%s' 
		WHERE uti_oid='%d'", $nom, $prenom, $email, $_SESSION["id"]);

	if ($bdd->exec($update) == 1) {

		header('refresh:5;url=?p=profil');
		$loader = "<div class='container'>
		<div class='row'>
			<div id='loading' class='loader'></div>
		</div>
	</div>";
	$valide = '<div class="text-success"> Profil modifié avec succès vous allez être rediriger sinon cliquez sur ce <a href="?p=profil">lien</a> pour être re diriger directement</div>';
} else {
	header('refresh:5;url=?p=profil');
	$loader = "<div class='container'>
	<div class='row'>
		<div id='loading' class='loader'></div>
	</div>
</div>";
$valide = '<div class="text-danger"> L\'email est déjà utilisé, les changements n\'ont pas été pris en compte <a href="?p=profil">Redirection</a> </div>';
}


}

}

if (isset($_POST['validPass'])) {

	$erreurMdp = testInput("Les champs doivent être remplis");
	header('refresh:5;url=?p=profil');
	$loader = "<div class='container'>
	<div class='row'>
		<div id='loading' class='loader'></div>
	</div>
</div>";

if (!empty($_POST['password']) & !empty($_POST['passwordVerif'])) {

	$erreurMdp = "";
	
	$mdp = $_POST['password'];
	$verifMdp = $_POST['passwordVerif'];

	if ($mdp != $verifMdp) {
		$erreurMdp = testInput("Les deux champs mot de passe doivent correspondrent");
		header('refresh:5;url=?p=profil');
		$loader = "<div class='container'>
		<div class='row'>
			<div id='loading' class='loader'></div>
		</div>
	</div>";
} else {
	$mdp = password_hash($mdp, PASSWORD_DEFAULT);

	$updatePwd = sprintf("UPDATE uti_utilisateur SET uti_mdp='%s'
		WHERE uti_oid='%d'", $mdp, $_SESSION["id"]);

	$modifMdp = $bdd->exec($updatePwd);

	$valideMdp = '<div class="text-success"> Mot de passe modifié avec succès cliquez sur ce <a href="?p=profil">lien</a> pour être re diriger directement</div>';

}
}



}


?>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="titre text-center text-uppercase animated bounceInLeft">profil</h1>
		</div>
	</div>


	<div class="col-sm-12">
		<div class="row">
			<div class="text-center">
				<?= isset($valide) ? $valide: "" ?> <br>
				<?= isset($valideMdp) ? $valideMdp: "" ?> <br>
				<?= isset($erreurMdp) ? $erreurMdp: "" ?>
				<?= isset($erreurMessage) ? $erreurMessage: "" ?>
				<?= isset($loader) ? $loader: "" ?>
			</div>
		</div>
	</div>
</div>