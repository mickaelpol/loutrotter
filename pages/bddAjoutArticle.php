<?php 
    $article_titre = htmlspecialchars($_POST['article_title'], ENT_QUOTES);
    $article_pays = htmlspecialchars($_POST['country_name'], ENT_QUOTES);
    $article_contenu_lieux = htmlspecialchars($_POST['place_content'], ENT_QUOTES);
    $article_contenu_monuments = htmlspecialchars($_POST['monuments_content'], ENT_QUOTES);
    $article_contenu_culture = htmlspecialchars($_POST['culture_content'], ENT_QUOTES);
    $article_video = htmlspecialchars($_POST['article_video'],ENT_QUOTES);
    $article_images = htmlspecialchars($_POST['article_images'], ENT_QUOTES);
    $date = date('d-m-y');

    $sql_ajout_article = sprintf('INSERT INTO art_article (art_date ,art_titre, art_pay_oid, art_contenu_lieux, art_contenu_monuments, art_contenu_culture, art_lienvideo, art_lieninsta)
    VALUES ("%s","%s", %d, "%s", "%s", "%s", "%s", "%s")',$date, $article_titre, $article_pays, $article_contenu_lieux, $article_contenu_monuments, $article_contenu_culture, $article_video, $article_images);
    try {
        $bdd->query($sql_ajout_article);
        ?>
        <h4 class='text-center'>Article enregistré avec succès<h4>
        <br>
        <p class='text-center'>redirection en cours<p>
        <br>
        <div class="container">
            <div class="row">
                <div id="loading" class='loader'></div>
            </div>
        </div>
        <?php
        header('refresh:3;url=?p=admin');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    };
?>
