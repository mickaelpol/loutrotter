<?php

if (isset($_SESSION['nom'])) {
    header("Location: ?p=accueil");
}

//  fonction verifiant si la valeurs des inputs n'est pas vide
function testInput($fichier){
    if(empty($_POST[$fichier]));
    return  $fichier;
}


// Une fois le bouton validé sété
if (isset($_POST['valid'])) {

    //  je test la valeur des inputs
    $message = testInput("Remplissez les champs vides");

    // si tous les inputs sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['emailVerif']) && !empty($_POST['password']) && !empty($_POST['passwordVerif'])) {

        // stockage des valeurs dans des variables
        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $emailVerif = htmlspecialchars($_POST['emailVerif'], ENT_QUOTES);
        $pwd = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $pwdVerif = htmlspecialchars($_POST['passwordVerif'], ENT_QUOTES);

        //  si le password correspond pas a la verif password ou l'email correspond pas a lemail verif
        if($pwd != $pwdVerif || $email != $emailVerif) {

            // alors je renvoi une erreurs
            $message = '<div class="row"><p class="text-danger text-center">Erreur sur les champ email ou mot de passe</p></div>';
            $mail = '<div class="row"><p class="text-danger text-center">Les deux mail doivent correspondrent</p></div>';
            $wrongPwd = '<div class="row"><p class="text-danger text-center">Les deux mot de passe doivent correspondrent</p></div>';

        }

        //  sinon je lance l'execution
        else {
            // hash du password
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            // préparation de la requete a envoyer
            $sql = sprintf("INSERT  INTO uti_utilisateur (uti_mdp, uti_nom, uti_prenom, uti_mail, uti_isadmin, uti_isbanned)
                VALUES ('%s', '%s', '%s', '%s', 0, 0)", $pwd, $nom, $prenom, $email);
            if ($bdd->exec($sql) ==1) {


            // envoi de la requete
                $message = '<div class="row"><p class="text-success text-center">L\'inscription à été validé ! cliquez <a href="?p=connection" >ici pour être re diriger directement</a></p></div>';
                $loader = "<div id='loading' class='loader'></div>";
                header('refresh:5;url=?p=connection');

            } else {
                $message = '<div class="row"><p class="text-danger text-center">  L\'email est déjà utilisé </p></div>';
            }
        }


    }

}




?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-12 page-header">
            <h1 class="titre text-center animated zoomInRight">Inscription</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
            <div><?= isset($message) ? $message: "" ?></div>
            <div><?= isset($loader) ? $loader: "" ?></div>
        </div>
    </div>
</div>

<p class='text-center text-danger' id="inputError"></p>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 formulaireCo">
            <form method="post" action="?p=inscription" role="form" id="inscription">
                <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="form-group float-label-control">
                        <label for="nom">Nom </label>
                        <input name="nom" id="nom" type="text" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="form-group float-label-control">
                        <label for="prenom">prenom</label>
                        <input name="prenom" id="prenom" type="text" class="form-control" placeholder="Prenom">
                    </div>
                </div>
                <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="form-group float-label-control">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                        <?= isset($mail) ? $mail: "" ?>
                    </div>
                    <p class="text-danger" id="egalEmail"></p>
                </div>
                <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="form-group float-label-control">
                        <label for="emailVerif">Verification email</label>
                        <input name="emailVerif" id="emailVerif" type="email" class="form-control" placeholder="Verification email">
                        <?= isset($mail) ? $mail: "" ?>
                    </div>
                    <p class="text-danger" id="egalEmail2"></p>
                </div>
                <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="form-group float-label-control">
                        <label for="password">Mot de passe</label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Mot de passe">
                        <?= isset($wrongPwd)? $wrongPwd : "" ?>
                    </div>
                    <p class="text-danger" id="egalMdp"></p>
                    <p class="text-danger" id="longMdp"></p>
                </div>
                <div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="form-group float-label-control">
                        <label for="passwordVerif">Verification mot de passe</label>
                        <input name="passwordVerif" id="passwordVerif" type="password" class="form-control" placeholder="Verification mot de passe">
                        <?= isset($wrongPwd)? $wrongPwd : "" ?>
                    </div>
                    <p class="text-danger" id="egalMdp2"></p>
                    <p class="text-danger" id="longMdp2"></p>
                </div>
                <div class="col-sm-2 col-sm-offset-10 col-xs-8 col-xs-offset-3">
                    <div class="form-group">
                        <input type="submit" name="valid" class="btn btn-md valider pull-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/animationForm.js"></script>
<script src="assets/js/inscription.js"></script>
