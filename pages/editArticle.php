<?php

if (!isset($_SESSION['admin'])) {
    header("Location: ?p=accueil");
} else {
    if ($_SESSION['admin'] === "0") {
        header("Location: ?p=accueil");
    }
}


$article_id = (INT)$_GET['id'];

$requete = sprintf('SELECT * FROM art_article, pay_pays WHERE art_pay_oid = pay_oid AND art_oid = %d', $article_id);
$reponse = $bdd->query($requete);
$donnees = $reponse->fetch();
?>
<div class="container">
    <div class="row ">
        <div class="col-lg-4 col-lg-offset-4 col-xs-12">
            <h1 class="titre page-header text-center">Editer un article</h1>
        </div>
    </div>
    <h4 id ='error' class="text-danger text-center"></h4>
    <br>
    <div class="row">
        <div class="col-lg-offset-2 col-xs-12">
            <form action="?p=update-article" method="post">
                <input type="number" class="hidden" name="article_id" value="<?= $donnees['art_oid'] ?>">
                <div class="row">
                    <!-- Input titre de l'article -->
                    <div id='checkTitre' class="form-group col-lg-6 col-xs-8">
                        <label for="titreArticle">Titre de l'article</label>
                        <input id="titreArticle" class="form-control" type="text" name="article_title" value="<?= $donnees['art_titre'] ?>">
                    </div>
                    <!-- Selecteur de pays -->
                    <div class="col-lg-2 col-xs-4">
                        <label for="pays">Pays</label>
                        <p><?= $donnees['pay_nom'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu du lieux -->
                    <div class="form-group col-lg-8">
                        <label for="lieux">Contenu de la catégorie "Lieux"</label>
                        <textarea class="form-control" name="place_content" id="lieux" cols="20" rows="8"><?= $donnees['art_contenu_lieux'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu de monuments -->
                    <div class="form-group col-lg-8">
                        <label for="monuments">Contenu de la catégorie "Monuments"</label>
                        <textarea class="form-control" name="monuments_content" id="monuments" cols="20" rows="8"><?= $donnees['art_contenu_monuments'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu de culture -->
                    <div class="form-group col-lg-8">
                        <label for="culture">Contenu de la catégorie "Culture"</label>
                        <textarea class="form-control" name="culture_content" id="culture" cols="20" rows="8"><?= $donnees['art_contenu_culture'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Lien vers video Youtube -->
                    <div class="form-group col-lg-8">
                        <label for="video">Lien de la vidéo Youtube</label>
                        <input class="form-control" id="video" type="text" name="article_video" value="<?= $donnees['art_lienvideo'] ?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Lien vers galerie Instagram -->
                    <div class="form-group col-lg-8">
                        <label for="images">Lien vers la galerie Instagram (<a target=_blank class="link" href="https://lightwidget.com/">lightwidget</a>)</label>
                        <input class="form-control" id="images" type="text" name="article_images" value="<?= $donnees['art_lieninsta'] ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-1 col-xs-4 col-xs-offset-3">
                        <a class="btn btn-danger" href="?p=admin">Annuler</a>
                    </div>
                    <!-- Bouton de soumission de formulaire -->
                    <div class="col-lg-offset-1 col-lg-1 col-xs-4">
                        <input id='valider' class="btn valider" type="submit" value="Valider">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/js/ajoutArticle.js"></script>
