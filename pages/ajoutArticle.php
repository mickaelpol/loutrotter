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
        <div class="col-lg-4 col-lg-offset-4 col-xs-10 col-xs-offset-1">
            <h1 class="titre page-header text-center">Ajouter un article</h1>
        </div>
    </div>
            <h4 id ='error' class="text-danger text-center"></h4>
    <br>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-9 col-xs-offset-1 col-xs-10">
            <form action="?p=traitement-ajout-article" method="post">
                <div class="row">
                    <!-- Input titre de l'article -->
                    <div id='checkTitre' class="form-group col-lg-6">
                        <label for="titreArticle">Titre de l'article</label>
                        <input id="titreArticle" class="form-control" type="text" name="article_title">
                    </div>
                    <!-- Selecteur de pays -->
                    <div class="col-lg-2">
                        <label for="pays">Pays</label>
                        <select class="form-control" name="country_name" id="pays">
                            <?php
                                $reponse = $bdd->query('SELECT * FROM pay_pays ORDER BY pay_nom ASC');
                                while ($donnees = $reponse->fetch())
                                {
                            ?>
                            <option value=<?= $donnees['pay_oid'] ?>><?= $donnees['pay_nom'] ?></option>
                            <?php
                                }
                                $reponse->closeCursor();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu du lieux -->
                    <div class="form-group col-lg-8">
                        <label for="lieux">Contenu de la catégorie "Lieux"</label>
                        <textarea class="form-control" name="place_content" id="lieux" cols="20" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu de monuments -->
                    <div class="form-group col-lg-8">
                        <label for="monuments">Contenu de la catégorie "Monuments"</label>
                        <textarea class="form-control" name="monuments_content" id="monuments" cols="20" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu de culture -->
                    <div class="form-group col-lg-8">
                        <label for="culture">Contenu de la catégorie "Culture"</label>
                        <textarea class="form-control" name="culture_content" id="culture" cols="20" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Lien vers video Youtube -->
                    <div class="form-group col-lg-8">
                        <label for="video">Lien de la vidéo Youtube</label>
                        <input class="form-control" id="video" type="text" name="article_video">
                    </div>
                </div>
                <div class="row">
                    <!-- Lien vers galerie Instagram -->
                    <div class="form-group col-lg-8">
                        <label for="images">Lien vers la galerie Instagram (<a target=_blank class="link" href="https://lightwidget.com/">lightwidget</a>)</label>
                        <input class="form-control" id="images" type="text" name="article_images">
                    </div>
                </div>
                <div class="row">
                    <!-- Bouton de soumission de formulaire -->
                    <div class="col-lg-offset-3 col-lg-3">
                        <input id='valider' class="btn valider" type="submit" value="Valider">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/js/ajoutArticle.js"></script>
