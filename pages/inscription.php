<?php 

function testInput($fichier){
    if(empty($_POST[$fichier]));
    return  'Une des valeurs n\'a pas été remplis ou est mal remplis';
}


// Si les input posté ne sont pas vide alors je connecte a la bdd et envoi la requete
if (isset($_POST['valid'])) {

    
    $message = testInput();

    
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['emailVerif']) && !empty($_POST['password']) && !empty($_POST['passwordVerif'])) {
        
        // stockage des valeurs dans des variables
        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $emailVerif = htmlspecialchars($_POST['emailVerif'], ENT_QUOTES);
        $pwd = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $pwdVerif = htmlspecialchars($_POST['passwordVerif'], ENT_QUOTES);

        
        if($pwd != $pwdVerif || $email != $emailVerif) {
            $message = '<div class="row"><p class="text-danger text-center">Erreur sur les champ email ou mot de passe</p></div>';
            $mail = '<div class="row"><p class="text-danger text-center">Les deux mail doivent correspondrent</p></div>';

        } 
        
        else {
        
            // hash du password 
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            // préparation de la requete a envoyer
            $sql = sprintf("INSERT  INTO uti_utilisateur (uti_mdp, uti_nom, uti_prenom, uti_mail, uti_isadmin, uti_isbanned) 
                    VALUES ('%s', '%s', '%s', '%s', 0, 0)", $pwd, $nom, $prenom, $email);
        
            // envoi de la requete
            $envoi = $bdd->query($sql);
            $message = '<div class="row"><p class="text-success text-center">L\'inscription à été validé ! cliquez <a href="?p=connection" >ici pour être re diriger directement</a></p></div>';
            header('refresh:5;url=?p=connection'); 
        }
        
        
    }

}




?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 page-header">
            <h1 class="titre text-center animated zoomInRight">Inscription</h1>
            <div class="text-danger text-center"><?= isset($message) ? $message: "" ?></div>
        </div>
    </div>
</div>

<p class='text-center text-danger' id="textError"></p>
<div class="container">
    <div class="row">
        <div class="col-sm-12 formulaireCo">
            <form method="post" action="?p=inscription" role="form" id="inscription">
                <div class="col-sm-4 col-sm-offset-1"  id="erreur1">
                    <div class="form-group float-label-control">
                        <label for="nom">Nom </label>
                        <input name="nom" id="nom" type="text" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2" id="erreur2">
                    <div class="form-group float-label-control">
                        <label for="prenom">prenom</label>
                        <input name="prenom" id="prenom" type="text" class="form-control" placeholder="Prenom">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="emailVerif">Verification email</label>
                        <input name="emailVerif" id="emailVerif" type="email" class="form-control" placeholder="Verification email">
                        <?= isset($mail) ? $mail: "" ?>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="password">Mot de passe</label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Mot de passe">
                        <?= isset($erreur) ? $erreur: '' ?>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="passwordVerif">Verification mot de passe</label>
                        <input name="passwordVerif" id="passwordVerif" type="password" class="form-control" placeholder="Verification mot de passe">
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


<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="assets/js/connection.js"></script>
<script src="assets/js/inscription.js"></script>