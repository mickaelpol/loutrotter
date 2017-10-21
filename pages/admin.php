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
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
            <h1 class="titre page-header text-center">Panneau d'administration</h1>
        </div>
    </div>
    <br>
    <div class="row text-center ">
        <div class="col-lg-offset-2 col-lg-2  col-xs-12"><br>
            <a href="?p=ajout-article" class="btn btn-success valider"><i class="fa fa-pencil-square-o"></i> Creer un article</a>
        </div>
        <div class="col-lg-offset-1 col-lg-2  col-xs-12"><br>
            <a href="?p=addPays" class="btn btn-success valider"><i class="fa fa-globe"></i> Ajouter un pays</a>
        </div>
        <div class="col-lg-offset-1 col-lg-2  col-xs-12"><br>
            <a href="?p=listeUsr" class="btn btn-success valider"><i class="fa fa-users"></i> Liste des utilisateurs</a>
        </div>
    </div>
    <div class="row">
        <hr>
        <div class="col-lg-4 col-lg-offset-4 col-xs-12 page-header">
            <h3 class="text-center">Liste des articles</h3><br>
        </div>
        <div class="col-lg-10 col-lg-offset-1 hidden-xs">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="valider text-center col-lg-7">Titre de l'article</th>
                        <th class="valider text-center col-lg-2">Pays</th>
                        <th class="valider text-center col-lg-1">Liste des commentaires</th>
                        <th class="valider text-center col-lg-1">Editer l'article</th>
                        <th class="valider text-center col-lg-1">Supprimer l'article</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reponse = $bdd->query('SELECT * FROM art_article INNER JOIN pay_pays ON art_pay_oid = pay_oid');
                    while ($donnees = $reponse->fetch()){
                        ?>
                        <tr>
                            <td class="text-center"><a class="link" href="?p=article&art=<?= $donnees['art_oid'] ?>"><?= $donnees['art_titre'] ?></a></td>
                            <td class="text-center"><?= $donnees['pay_nom'] ?></td>
                            <td class="text-center"><a class="btn lien" href="?p=listCom&id=<?= $donnees['art_oid'] ?>"><i class="fa fa-comments-o fa-2x"></i></a></td>
                            <td class="text-center"><a class="btn lien" href="?p=edit-article&id=<?= $donnees['art_oid'] ?>"><i class="fa fa-pencil fa-2x"></i></a></td>
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
                                            <p><span class="gras">Attention voulez vous vraiment supprimer l'article: <br> <?=$donnees['art_titre'] ?> ?</span></p>
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
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <!-- tableau mobile -->
        <div class="container visible-xs jumbotron">
            <div id="list-responsive">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2 text-center">
                        <div>Titre</div><br>
                        <div>Pays</div><br>
                        <div>Modérer commentaires</div><br>
                        <div>Editer article</div><br>
                        <div>Supprimer article</div>
                    </div>
                    <div class="col-xs-6 text-center list">
                            <?php
                            $rep = $bdd->query('SELECT * FROM art_article INNER JOIN pay_pays ON art_pay_oid = pay_oid');
                            while ($donnees = $rep->fetch()){
                            ?>
                        <div><a class="link" href="?p=article&art=<?= $donnees['art_oid'] ?>"><?= $donnees['art_titre'] ?></a></div><br>
                        <div class=""><?= $donnees['pay_nom'] ?></div><br>
                        <div><a class="btn lien" href="?p=listCom&id=<?= $donnees['art_oid'] ?>"><i class="fa fa-comments-o fa-2x"></i></a></div><br>
                        <div><a class="btn lien" href="?p=edit-article&id=<?= $donnees['art_oid'] ?>"><i class="fa fa-pencil fa-2x"></i></a></div><br>
                        <div>
                            <a class="btn lien" href="#" data-toggle="modal" data-target="#modalSupArticlexs<?= $donnees['art_oid'] ?>"><i class="fa fa-trash fa-2x"></i></a>
                            <!-- Modal -->
                            <div id="modalSupArticlexs<?= $donnees['art_oid'] ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content contenu_modal col-xs-10 col-xs-offset-1">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center">Suppression</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><span class="gras text-danger">Attention voulez vous vraiment supprimer l'article: <br> <?=$donnees['art_titre'] ?> ?</span></p>
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
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div><br>
                <div class="text-center">
                    <ul class="pagination"></ul>
                </div>
            </div>
        </div>
</div>

<script src="assets/js/paginationCom.js"></script>