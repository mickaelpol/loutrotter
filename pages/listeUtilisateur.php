<?php

if (!isset($_SESSION['admin'])) {
    header("Location: ?p=accueil");
} else {
    if ($_SESSION['admin'] === "0") {
        header("Location: ?p=accueil");
    }
}

?>



<div class="container">
    <div class="row ">
        <div class="col-lg-6 col-lg-offset-3">
            <h1 class="titre page-header text-center">Liste des utilisateurs</h1>
        </div>
        <br>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <table class="table table-bordered table-stripped table-hover">
                <thead>
                    <tr>
                        <th class="colorNav text-center col-lg-3">Nom</th>
                        <th class="colorNav text-center col-lg-3">Prénom</th>
                        <th class="colorNav text-center col-lg-4">Adresse email</th>
                        <th class="colorNav text-center col-lg-2">BAN / UNBANN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reponse = $bdd->query('SELECT * FROM uti_utilisateur WHERE uti_isadmin = 0');
                    while ($donnees = $reponse->fetch()){

                ?>
                    <tr>
                        <td class="text-center"><?= $donnees['uti_nom'] ?></td>
                        <td class="text-center"><?= $donnees['uti_prenom'] ?></td>
                        <td class="text-center"><?= $donnees['uti_mail'] ?></td>
                        <td class="text-center"><?=  $donnees['uti_isbanned']==='0' ? '<a class="link" href="?p=gestionBan&uti='.$donnees['uti_oid'].'"><i class="fa fa-unlock"></i></a>': '<a class="link" href="?p=gestionBan&uti='.$donnees['uti_oid'].'"><i class="fa fa-lock"></i></a>'  ?></td>
                    </tr>
                <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
