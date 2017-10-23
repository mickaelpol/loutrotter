<?php



$recherche = htmlspecialchars($_POST['s'], ENT_QUOTES);

$sqlsearch = sprintf("SELECT * FROM art_article INNER JOIN pay_pays ON art_pay_oid = pay_oid WHERE art_titre LIKE '%%%s%%' OR pay_nom LIKE '%%%s%%' ", $recherche, $recherche);


$result = $bdd->query($sqlsearch)->fetchAll();

if (empty($result)) {
    ?>
    <div class="container">
        <div class="row ">
            <div class="col-xs-4 col-xs-offset-4">
                <h3 class="text-center">La recherche n'a donné aucun résultat.</h3>
            </div>
        </div>
    </div>
    <?php
}


?>

<div class="container">
    <div id="test-list">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-xs-10 col-xs-offset-1 list">
                <?php foreach($result as $key=>$value):  ?>
                    <div class="col-lg-12 col-xs-12 col-sm-12 jumbotron">
                        <div class="col-lg-8 col-xs-12 col-sm-10 com">
                            <h2 class="text-capitalize"><u><?=  $value['art_titre']; ?></u></h2>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-2">
                            <p><a class="btn btn-info pull-right" href="?p=article&art=<?= $value['art_oid']?>">Lire l'article</a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="text-center">
            <ul class="pagination"></ul>
        </div>
    </div>
</div>


<script type="text/javascript" src="./assets/js/paginationCom.js"></script>
