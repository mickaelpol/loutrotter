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

    <h1 class='titre animated zoomInRight col-sm-offset-4 col-sm-4'><?= $titre['pay_nom'] ?></h1>

    <?php
    if (empty($result)) {
    ?>
    <div class="container">
        <div class="row ">
            <div class="col-xs-4 col-xs-offset-4">
                <h3 class="text-center">Aucun article de disponible pour ce pays.</h3>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

</header>
<div class="container">
    <?php foreach($result as $key=>$value):  ?>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 jumbotron listpays">
            <h5><a href="?p=article&art=<?= $value['art_oid']?>"><?=  $value['art_titre']; ?></a></h5>
        </div>
    </div>
    <?php endforeach; ?>
</div>
