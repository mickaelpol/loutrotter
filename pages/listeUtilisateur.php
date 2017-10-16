<div class="container">
    <div class="row ">
        <div class="col-xs-6 col-xs-offset-3">
            <h1 class="titre page-header text-center">Liste des utilisateurs</h1>
        </div>
        <br>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th class="valider text-center col-sm-3">Nom</th>
                        <th class="valider text-center col-sm-3">Prénom</th>
                        <th class="valider text-center col-sm-4">Adresse email</th>
                        <th class="valider text-center col-sm-2">BAN / UNBANN</th>
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
                        <td class="text-center"><?=  $donnees['uti_isbanned']==='0' ? '<a href="?p=gestionBan&uti='.$donnees['uti_oid'].'"><i class="fa fa-unlock"></i></a>': '<a href="?p=gestionBan&uti='.$donnees['uti_oid'].'"><i class="fa fa-lock"></i></a>'  ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>