<?php
if(empty($_GET['art'])){
    header("Location: ?p=accueil");
}
$req = sprintf("select  * from art_article where art_oid = %d",$_GET['art']);
$result = $bdd->query($req)->fetch();


$article_Id = $_GET['art'];




$form = "<form method='POST'>
<div class='form-group'>
<label for='com'>Commentaire :</label>
<textarea class='form-control' maxlength=255 name='commentaire' id='commentaire' cols='10' rows='5'></textarea>
</div>
<input name='validCom' class='btn valider btn-md btn-success pull-right' type='submit' value='Envoyer'>
</form>";


if (!isset($_SESSION['id'])) {
    $form = "<h6>Connectez vous pour poster des comms</h6><form class='animated hinge' method='POST'>
    <div class='form-group'>
    <label for='com'>Commentaire :</label>
    <textarea class='form-control' maxlength=255 name='commentaire' id='commentaire' cols='10' rows='5'></textarea>
    </div>
    <input name='validCom' class='btn valider btn-md btn-success pull-right' type='submit' value='Envoyer'>
    </form>";
}

if (isset($_POST['validCom'])) {

    if (!empty($_POST['commentaire'])) {
        $com = htmlspecialchars($_POST['commentaire'],ENT_QUOTES);
        $date = date('y-m-d');
        $sql = sprintf("insert into com_commentaire (com_art_oid, com_uti_oid, com_contenu, com_date)
            values (%d , %d, '%s' ,'%s')",$article_Id, $_SESSION['id'],$com, $date);
        
        $bdd->query($sql);
        // traitement de la requetes

    }

}
$selecCom = sprintf("select  uti_oid, uti_prenom , com_contenu, com_oid, DATE_FORMAT(com_date, '%%d/%%m/%%y') as dat from uti_utilisateur, com_commentaire
    where uti_oid = com_uti_oid and com_art_oid = %d", $article_Id);
$reponse = $bdd->query($selecCom);


?>


<header class="page-header container text-center">
    <h1 class='titre'><?= $result['art_titre'] ?></h1>
</header>
<main class="container">
    <div class ='row'>

        <div class="col-sm-offset-3 col-sm-6 video">
            <?= htmlspecialchars_decode($result['art_lienvideo'],ENT_QUOTES)?>
        </div>
    </div>
    <div class="container">
        <section class='col-sm-offset-1 col-sm-9'>
            <div class="row">
                <h3 class='titre'>

                <?= !empty($result['art_contenu_lieux']) ? '<i class="fa fa-map-signs" aria-hidden="true"></i>Lieux' : "" ?>
                </h3>
                <p class='text-left'>
                    <?= $result['art_contenu_lieux'] ?>
                </p>

            </div>
            <div class="row">
                <h3 class='titre text-right'> 
                <?= !empty($result['art_contenu_monuments']) ? 'Monument<i class="fa fa-university" aria-hidden="true"></i>' : "" ?>
                </h3>
                <p class='text-right'>
                    <?= $result['art_contenu_monuments'] ?>

                </p>
            </div>
            <div class="row">
                <h3 class='titre'>
                <?= !empty($result['art_contenu_culture']) ? 'Culture' : "" ?>
                </h3>
                <p class='text-left'>
                    <?= $result['art_contenu_culture'] ?>

                </p>
            </div>
            <div class='row'>
                <?= htmlspecialchars_decode($result['art_lieninsta'],ENT_QUOTES)?>
            </div>
        </section>

    </div>
</main>


<div class="container espCom">
    <div class="row">
        <h3 class="text-center page-header">Espace commentaires</h3>
        <h6 class="text-danger text-center"><?= isset($notConnected)? $notConnected: "" ?></h6>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?= $form ?>
        </div>
    </div>

</div>

<!--  AFFICHAGE DES COMMENTAIRES  -->
<div class="container espCom">
    <div id="test-list">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 list jumbotron">
                <?php while($donnees = $reponse->fetch()){  ?>
                <ul class="list-unstyled">
                    <li><h3><u><?= $donnees['uti_prenom'] ?></u></h3></li>
                    <?= $donnees['uti_oid'] === $_SESSION['id'] ? '<li class="text-right"> <a href="?p=supComArt&id='.$donnees["com_oid"].'&art='.$article_Id.'"><i class="fa fa-trash fa-2x"></i></a></li>' : '' ?>
                    <li><p class="com"><?= $donnees['com_contenu'] ?></p></li>
                    <li class='text-right'><?= $donnees['dat'] ?></li>
                    <li><hr></li>
                </ul>
                <?php
                }
                    $reponse->closeCursor();
                ?>
            </div>
        </div>
        <div class="text-center">
            <ul class="pagination"></ul>
        </div>
    </div>
</div>

<script type="text/javascript" src="./assets/js/paginationCom.js"></script>