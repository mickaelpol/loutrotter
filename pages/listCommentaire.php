<?php 
    $article_id = htmlspecialchars($_GET['id']);
    $requete = sprintf("SELECT *, DATE_FORMAT(com_date, '%%d/%%m/%%y') as dat 
    FROM com_commentaire, uti_utilisateur
    WHERE uti_oid = com_uti_oid
    AND com_art_oid = %d", $article_id);

    $reponse = $bdd->query($requete);
    $titre = $bdd->query(sprintf("select art_titre from art_article where art_oid = %d ", $article_id))->fetch();

?>

<div class="container">
    <div class="row ">
        <div class="col-xs-6 col-xs-offset-3">
            <h1 class="titre page-header text-center">Commentaires de l'article :<br><?= $titre['art_titre'] ?></h1>
        </div>
    </div>
</div>
<!--  AFFICHAGE DES COMMENTAIRES  -->
<div class="container espCom">
    <div id="list-com">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 list jumbotron">
                <?php while($donnees = $reponse->fetch()){  ?>
                <ul class="list-unstyled">
                    <li><h3><u><?= $donnees['uti_prenom'] ?></u></h3></li>
                    <li class="text-right"> <a href="?p=supCom&id=<?= $donnees['com_oid'].'&art='.$article_id ?>"><i class="fa fa-trash fa-2x"></i></a></li>
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