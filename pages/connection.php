<?php 

if (isset($_SESSION['nom'])) {
    header("Location: ?p=accueil");
}

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
        $pwd = ($_POST['password']);

        $sql = sprintf('SELECT * FROM uti_utilisateur WHERE uti_mail = "%s";', $email);

        $reponse = $bdd->query($sql);
        $row = $reponse->fetch();

        // Verification de la correspondance du mot de passe tapé et celui sotcké dans la BDD et si l'users est ban ou pas
        if ($email === $row['uti_mail']) {

            if ($row['uti_isbanned'] === "0") {

                if (password_verify($pwd, $row['uti_mdp'])) {
                    $_SESSION['nom'] = $row['uti_prenom'];
                    $_SESSION['admin'] = $row['uti_isadmin'];
                    $_SESSION['id'] = $row['uti_oid'];

                    $valide = '<div class="text-success"> Connection veuillez patientez vous allez être rediriger sinon cliquez sur ce <a href="?p=accueil">lien</a> pour être re diriger directement</div>';
                    $loader = "<div class='container'>
                    <div class='row'>
                        <div id='loading' class='loader'></div>
                    </div>
                </div>";
                if ($_SESSION["admin"] === "1") {
                    header('refresh:3;url=?p=admin');
                }
                else {
                header('refresh:3;url=?p=accueil');    
                }
            }
            else {
                $valide = '<div class="text-danger"> Identifiants Incorrect <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>';
            }

        } 
        else {
            $valide = '<div class="text-danger"> Utilisateur Banni <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>';
        }
    } else {
        $valide = '<div class="text-danger"> Identifiants Incorrect <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>';
    }


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
            <?= isset($valide) ? $valide: "" ?> <br>
            <?= isset($loader) ? $loader: "" ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 formulaireCo">
            <form method="post" role="form" id="connection">
                <div class="form-group float-label-control">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                    <?= isset($errMail)? $errMail: "" ?>
                </div>
                <p id='erreur1'></p>
                <div class="form-group float-label-control">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                    <?= isset($errPwd)? $errPwd: "" ?>
                </div>
                <p id='erreur2'></p>
                <div class="form-group">
                    <input type="submit" name="valid" class="btn btn-md btn-success pull-right">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Latest compiled and minified JS -->
<script src="node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="assets/js/connection.js"></script>
<script src="assets/js/animationForm.js"></script>