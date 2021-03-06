<?php

if (!isset($_SESSION['admin'])) {
    header("Location: ?p=accueil");
} else {
    if ($_SESSION['admin'] === "0") {
        header("Location: ?p=accueil");
    }
}

$article_titre = htmlspecialchars($_POST['article_title'], ENT_QUOTES);
$article_pays = htmlspecialchars($_POST['country_name'], ENT_QUOTES);
$article_contenu_lieux = htmlspecialchars($_POST['place_content'], ENT_QUOTES);
$article_contenu_monuments = htmlspecialchars($_POST['monuments_content'], ENT_QUOTES);
$article_contenu_culture = htmlspecialchars($_POST['culture_content'], ENT_QUOTES);
$article_video = htmlspecialchars($_POST['article_video'],ENT_QUOTES);
$article_images = htmlspecialchars($_POST['article_images'], ENT_QUOTES);


$sql_ajout_article = sprintf('INSERT INTO art_article (art_date ,art_titre, art_pay_oid, art_contenu_lieux, art_contenu_monuments, art_contenu_culture, art_lienvideo, art_lieninsta)
    VALUES (now(),"%s", %d, "%s", "%s", "%s", "%s", "%s")',$article_titre, $article_pays, $article_contenu_lieux, $article_contenu_monuments, $article_contenu_culture, $article_video, $article_images);

// INSERT INTO art_article (art_oid, art_contenu_lieux, art_contenu_monuments, art_contenu_culture, art_titre, art_date, art_pay_oid)
// VALUES (1, 'lieux', 'monuments', 'culture', 'titre', now(), 1);
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
