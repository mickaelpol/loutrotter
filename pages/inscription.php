<?php 

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $emailVerif = $_POST['emailVerif'];
    $pwd = $_POST['password'];
    $pwdVerif = $_POST['passwordVerif'];

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
            <form method="post" role="form">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="nom">Nom</label>
                        <input name="nom" id="nom" type="text" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="prenom">prenom</label>
                        <input name="prenom" id="prenom" type="text" class="form-control" placeholder="Prenom">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="mail" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group float-label-control">
                        <label for="emailVerif">Verification email</label>
                        <input name="emailVerif" id="emailVerif" type="text" class="form-control" placeholder="Verification email">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group float-label-control">
                        <label for="password">Mot de passe</label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Mot de passe">
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
                        <input type="submit" class="btn btn-md btn-success pull-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Latest compiled and minified JS -->
<script src="//code.jquery.com/jquery.js"></script>

<script src="assets/js/connection.js"></script>