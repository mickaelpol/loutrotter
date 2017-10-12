<?php
$article_id = (INT)$_POST['article_id'];
$article_titre = htmlspecialchars($_POST['article_title'], ENT_QUOTES);
$article_contenu_lieux = htmlspecialchars($_POST['place_content'], ENT_QUOTES);
$article_contenu_monuments = htmlspecialchars($_POST['monuments_content'], ENT_QUOTES);
$article_contenu_culture = htmlspecialchars($_POST['culture_content'], ENT_QUOTES);
$article_video = htmlspecialchars($_POST['article_video'],ENT_QUOTES);
$article_images = htmlspecialchars($_POST['article_images'], ENT_QUOTES);


$sql_update_article = sprintf('UPDATE art_article
SET art_titre = "%s", art_contenu_lieux = "%s", art_contenu_monuments = "%s", art_contenu_culture = "%s", art_lienvideo = "%s", art_lieninsta = "%s"
WHERE art_oid = %d
', $article_titre, $article_contenu_lieux, $article_contenu_monuments, $article_contenu_culture, $article_video, $article_images, $article_id);

try{
    $bdd->query($sql_update_article);
    ?>
    <h4 class='text-center'>Article édité avec succès<h4>
    <br>
    <p class='text-center'>redirection en cours<p>
    <br>
    <div class="container">
        <div class="row">
            <div id="loading" class='loader'></div>
        </div>
    </div>
    <?php
    header('refresh:3;url=?p=article&art='.$article_id);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
};
?>