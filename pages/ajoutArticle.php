<div class="container">
    <div class="row ">
        <div class="col-sm-4 col-sm-offset-4">
            <h1 class="titre page-header text-center">Ajouter un article</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-offset-3">
            <form action="?p=traitement-ajout-article" method="post">
                <div class="row">
                    <!-- Input titre de l'article -->
                    <div class="form-group col-sm-6">
                        <label for="titreArticle">Titre de l'article</label>
                        <input id="titreArticle" class="form-control" type="text" name="article_title">
                    </div>
                    <!-- Selecteur de pays -->
                    <div class="col-sm-2">
                        <label for="pays">Pays</label>
                        <select class="form-control" name="country_name" id="pays">
                            <option value="test">test</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu du lieux -->
                    <div class="form-group col-sm-8">
                        <label for="lieux">Contenu de la catégorie "Lieux"</label>
                        <textarea class="form-control" name="place_content" id="lieux" cols="20" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu de monuments -->
                    <div class="form-group col-sm-8">
                        <label for="monuments">Contenu de la catégorie "Monuments"</label>
                        <textarea class="form-control" name="monuments_content" id="monuments" cols="20" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Contenu de culture -->
                    <div class="form-group col-sm-8">
                        <label for="culture">Contenu de la catégorie "Culture"</label>
                        <textarea class="form-control" name="culture_content" id="culture" cols="20" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-8">
                        <label for="video">Lien de la vidéo Youtube (ex: https://www.youtube.com/watch?v=dQw4w9WgXcQ)</label>
                        <input class="form-control" id="video" type="text" name="article_video">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-8">
                        <label for="images">Lien vers la galerie Instagram</label>
                        <input class="form-control" id="images" type="text" name="article_images">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-3">
                        <input class="btn valider" type="submit" value="Valider">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
