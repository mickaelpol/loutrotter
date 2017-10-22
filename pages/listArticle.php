<?php
$titre= '';
if(empty($_GET["pay"])){
    header("Location: ?p=accueil");
}
else{
    $titre=$bdd->query(sprintf("select pay_nom from pay_pays where pay_oid = %d",$_GET['pay']))->fetch();


    $request = sprintf("select * from  art_article where art_pay_oid = %d",$_GET['pay']);
    $result = $bdd->query($request)->fetchAll();
}

?>
<header class="page-header container text-center">

    <h1 class='titre animated zoomInRight col-lg-offset-4 col-lg-4'><?= $titre['pay_nom'] ?></h1>

    <?php
    if (empty($result)) {
        ?>
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-lg-offset-4 bord">
                    <h3 class="text-center animated zoomInRight">Aucun article de disponible pour ce pays.</h3>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</header>
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

