<?php 

	

?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="titre text-center text-uppercase animated bounceInLeft">profil</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 formulaireCo">
			<form method="post" role="form" id="connection">
				<div class="form-group float-label-control">
					<label for="nom">Nom</label>
					<?php 

					$reponse = $bdd->query('SELECT * FROM uti_utilisateur WHERE uti_oid = '.$_SESSION["id"].' ');
					while ($donnees = $reponse->fetch()){

						?>
						<input name="nom" id="nom" type="nom" class="form-control" value="<?= $donnees['uti_nom'] ?>" placeholder="Nom">
					</div>
					<div class="form-group float-label-control">
						<label for="prenom">Prenom</label>
						<input name="prenom" id="prenom" type="prenom" class="form-control" placeholder="Prenom" value="<?= $donnees['uti_prenom'] ?>">
					</div>
					<div class="form-group float-label-control">
						<label for="email">Email</label>
						<input name="email" id="email" type="email" class="form-control" placeholder="Email" value="<?= $donnees['uti_mail'] ?>">
					</div>
					<div class="form-group float-label-control">
						<label for="password">Password</label>
						<input name="password" id="password" type="password" class="form-control" placeholder="Password">
					</div>
					<?php 
				}
				?>
				<div class="form-group">
					<input type="submit" name="valid" class="btn btn-md btn-success pull-right">
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="assets/js/animationForm.js"></script>