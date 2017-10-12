<?php 

    // Fonction verifiant si les inputs sont vide
function testInput($fichier){
    if (empty($_POST[$fichier])) {
        return '<div class="text-danger">Le champ '. $fichier .' doit être remplis</div>';
    } 
}

if (isset($_POST['valid'])) {

    //  je test si les inputs ne sont pas vides
    $errMail = testInput("Email");
    $errPwd = testInput("Mot de passe");

    //  si les inputs ne sont pas vides
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

        $errMail = "";
        $errPwd = "";
        // je stocke les valeurs posté dans des variables
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $pwd = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $valide = '<div class="text-success"> Connection en cours patientez vous allez être rediriger sinon cliquez sur ce <a href="?p=accueil">lien</a> pour être re diriger directement</div>';
        // header('refresh:5;url=?p=accueil');

    }



}

?>
<div class="container">
    <div class="row">
        <div class="page-header col-sm-6 col-sm-offset-3">    
            <h1 class="animated zoomInLeft text-center titre text-uppercase">Connection</h1>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="row">
        <div class="text-center">
            <?= isset($valide) ? $valide: "" ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 formulaireCo">
            <form method="post" role="form">
                <div class="form-group float-label-control">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                    <?= isset($errMail)? $errMail: "" ?>
                </div>
                <div class="form-group float-label-control">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                    <?= isset($errPwd)? $errPwd: "" ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="valid" class="btn btn-md btn-success pull-right">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Latest compiled and minified JS -->
<script src="//code.jquery.com/jquery.js"></script>

<script src="assets/js/connection.js"></script>