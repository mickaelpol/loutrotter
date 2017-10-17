<?php

if (!isset($_SESSION['nom'])) {
	header("Location: ?p=accueil");
}

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="titre text-center text-uppercase animated zoomInRight">profil</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="row">
			<div class="col-sm-12 margeErreur">
				<h3 class="text-center text-uppercase">
					Modification du profil
				</h3>
			</div>
		</div>

		<!-- Formulaire de changement du Nom Prenom Email -->
		<div class="col-sm-4 col-sm-offset-4 formulaireCo">
			<form method="post" action="?p=traitModifProfil" role="form" id="modifProfil">
				<?php

				$reponse = $bdd->query('SELECT * FROM uti_utilisateur WHERE uti_oid = '.$_SESSION["id"].' ');
				while ($donnees = $reponse->fetch()){

					?>
					<div class="form-group float-label-control">
						<label for="nom">Nom</label>
						<input  name="nom" id="nom" type="nom" class="form-control" value="<?= $donnees['uti_nom'] ?>" placeholder="Nom">
					</div>
					<p class="text-danger text-center" id='erreurNom'></p>
					<div class="form-group float-label-control">
						<label for="prenom">Prenom</label>
						<input  name="prenom" id="prenom" type="prenom" class="form-control" placeholder="Prenom" value="<?= $donnees['uti_prenom'] ?>">
					</div>
					<p class="text-danger text-center" id="erreurPrenom"></p>
					<div class="form-group float-label-control">
						<label for="email">Email</label>
						<input  name="email" id="email" type="email" class="form-control" placeholder="Email" value="<?= $donnees['uti_mail'] ?>">
					</div>
					<p class="text-danger text-center" id="erreurMail"></p>
					<div class="form-group">
						<input type="submit" name="validForm" class="btn btn-md btn-success pull-right">
					</div>
					<?php
				}
				?>
			</form>
		</div>

		<div class="row">
			<div class="col-sm-12 margeErreur">
				<h3 class="text-center text-uppercase">
					changement de mot de passe
				</h3>
			</div>
		</div>

		<!-- Formualaire de changement du mot de passe -->
		<div class="col-sm-4 col-sm-offset-4 formulaireCo">
			<form method="post" role="form" action="?p=traitModifProfil" id="modifPassword">
				<div class="form-group float-label-control">
					<label for="password">Mot de passe</label>
					<input name="password" id="password" type="password" class="form-control"  placeholder="Mot de passe">
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="margeErreur text-justify">
							<!-- erreur des erreurs de l'inputs password -->
							<p class="text-danger text-center" id="erreurPassword"></p>
							<p class="text-danger text-center" id="erreurCorrespond"></p>
							<p class="text-danger text-center" id="erreurInf"></p>
						</div>
					</div>
				</div>

				<!-- verif mot de passe -->
				<div class="form-group float-label-control">
					<label for="passwordVerif">Verification du mot de passe</label>
					<input name="passwordVerif" id="passwordVerif" type="password" class="form-control"  placeholder="Verification du mot de passe">
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="margeErreur text-justify">
							<!-- stockage des erreurs de l'input verif -->
							<p class="text-danger text-center" id="erreurPasswordVerif"></p>
							<p class="text-danger text-center" id="erreurCorrespond2"></p>
							<p class="text-danger text-center" id="erreurInf2"></p>
						</div>
					</div>
				</div>

				<!-- Bouton pour valider le changement du mot de passe -->
				<div class="form-group">
					<input type="submit" name="validPass" class="btn btn-md btn-success pull-right">
				</div>
			</form>
			<!-- <div class="container"> -->
				<!-- </div> -->
			</div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 margeSupp">
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-danger btn-lg pull-right" data-toggle="modal" data-target="#myModal">Supprimer le compte</button>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-danger text-center text-uppercase">Suppression du compte</h4>
							</div>
							<div class="modal-body">
								<p class="text-danger text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Êtes vous certain de vouloir supprimer votre compte ?</p>
							</div>
							<div class="modal-footer">
								<form action="?p=traitModifProfil" method="POST">
									<input type="text" class="hidden" name="idUser" value="<?= $_SESSION['id'] ?>">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
									<button type="submit" name="validSupp" class="btn btn-success">Valider suppression</button>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/animationForm.js"></script>
	<script type="text/javascript" src="assets/js/modifProfil"></script>
