<div class="container">
    <div class="row ">
        <div class="col-xs-4 col-xs-offset-4">
            <h1 class="titre page-header text-center">Panneau d'administration</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-offset-2 col-xs-2">
            <a href="?p=ajout-article" class="btn valider"><i class="fa fa-pencil-square-o"></i> Creer un article</a>
        </div>
        <div class="col-xs-offset-1 col-xs-2">
            <a href="?p=addPays" class="btn valider"><i class="fa fa-globe"></i> Ajouter un pays</a>
        </div>
        <div class="col-xs-offset-1 col-xs-2">
            <a href="#" class="btn valider"><i class="fa fa-users"></i> Liste des utilisateurs</a>
        </div>
    </div>
    <div class=" row">
        <hr>
        <div class="col-xs-4 col-xs-offset-4">
            <h3 class="text-center">Liste des articles</h3><br>
        </div>
        <div class="col-xs-10 col-xs-offset-1">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="valider text-center col-sm-7">Titre de l'article</th>
                        <th class="valider text-center col-sm-2">Pays</th>
                        <th class="valider text-center col-sm-1">Liste des commentaires</th>
                        <th class="valider text-center col-sm-1">Editer un article</th>
                        <th class="valider text-center col-sm-1">Supprimer un article</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $reponse = $bdd->query('SELECT * FROM art_article INNER JOIN pay_pays ON art_pay_oid = pay_oid');
                        while ($donnees = $reponse->fetch()){
                    ?>
                        <tr>
                            <td class="text-center"><?= $donnees['art_titre'] ?></td>
                            <td class="text-center"><?= $donnees['pay_nom'] ?></td>
                            <td class="text-center"><a class="btn lien" href="#"><i class="fa fa-comments-o fa-2x"></i></a></td>
                            <td class="text-center"><a class="btn lien" href="#"><i class="fa fa-pencil fa-2x"></i></a></td>
                            <td class="text-center">
                                <a class="btn lien" href="#" data-toggle="modal" data-target="#modalSupArticle<?= $donnees['art_oid'] ?>"><i class="fa fa-trash fa-2x"></i></a>
                                <!-- Modal -->
                                <div id="modalSupArticle<?= $donnees['art_oid'] ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content contenu_modal col-sm-6 col-sm-offset-2">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center">Suppression</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><span class="gras">Attention voulez vous vraiment supprimer l'article : <?=$donnees['art_titre'] ?> ?</span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="?p=bdd-suppression-article" method="post">
                                                <input class="hidden" name="suppr-article" value="<?=$donnees['art_oid'] ?>">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn valider">Valider</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
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