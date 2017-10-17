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
    <?php foreach($result as $key=>$value): ?>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 jumbotron listpays">
            <h5><a href="?p=article&art=<?= $value['art_oid']?>"><?=  $value['art_titre']; ?></a></h5>
        </div>
    </div>
    <?php endforeach; ?>
</div>
