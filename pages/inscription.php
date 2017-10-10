<?php 

// Si les input posté de sont pas vide alors je connecte a la bdd et envoi la requete
if (!empty($_POST)) {

    // stockage des valeurs dans des variables
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
    $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $emailVerif = htmlspecialchars($_POST['emailVerif'], ENT_QUOTES);
    $pwd = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $pwdVerif = htmlspecialchars($_POST['passwordVerif'], ENT_QUOTES);

    // préparation de la requete a envoyer
    $sql = sprintf("INSERT  INTO uti_utilisateur (uti_mdp, uti_nom, uti_prenom, uti_mail, uti_isadmin, uti_isbanned) 
            VALUES ('%s', '%s', '%s', '%s', 0, 0)", $pwd, $nom, $prenom, $email);

    //  var_dump($sql); die();
    // envoi de la requete
    $envoi = $bdd->query($sql);

}




?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 page-header">
            <h1 class="titre text-center animated zoomInRight">Inscription</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 bord">
            <form method="post" action="?p=inscription" role="form">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="nom">Nom</label>
                        <input name="nom" id="nom" type="text" class="form-control" required="required" placeholder="Nom">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="prenom">prenom</label>
                        <input name="prenom" id="prenom" type="text" class="form-control" required="required" placeholder="Prenom">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" class="form-control" required="required" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="emailVerif">Verification email</label>
                        <input name="emailVerif" id="emailVerif" type="email" class="form-control" required="required" placeholder="Verification email">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="password">Mot de passe</label>
                        <input name="password" id="password" type="password" class="form-control" required="required" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="passwordVerif">Verification mot de passe</label>
                        <input name="passwordVerif" id="passwordVerif" type="password" class="form-control" required="required" placeholder="Verification mot de passe">
                    </div>
                </div>
                <div class="col-sm-2 col-sm-offset-9">
                    <div class="form-group">
                        <input type="submit" name="valid" class="btn btn-md btn-success pull-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Latest compiled and minified JS -->
<script src="//code.jquery.com/jquery.js"></script>

<script src="assets/js/connection.js"></script>