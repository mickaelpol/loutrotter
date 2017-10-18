<?php
$titre= '';
if(empty($_GET["cont"])){
    header("Location: ?p=accueil");
}
else{
    $titre=$bdd->query(sprintf("select con_nom from con_continent where con_oid = %d",$_GET['cont']))->fetch();


    $request = sprintf("select * from  pay_pays where pay_con_oid = %d",$_GET['cont']);
    $result = $bdd->query($request)->fetchAll();
}

?>




<header class="page-header container text-center">
    <h1 class='titre animated zoomInLeft col-sm-offset-4 col-sm-4'><?= $titre['con_nom'] ?></h1>
</header>

<?php
if (empty($result)) {
    ?>
    <div class="container">
        <div class="row ">
            <div class="col-xs-4 col-xs-offset-4">
                <h3 class="text-center">Oops le Loutrotter n'a pas encore écrit d'article pour ce continent!</h3>
            </div>
        </div>
    </div>
    <?php
}
?>

<div class="container">
    <div id="test-list">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 list">
                <?php foreach($result as $key=>$value):  ?>
                    <div class="col-sm-12 jumbotron">
                        <div class="col-sm-4">
                            <h2 class="text-capitalize"><u><?=  $value['pay_nom']; ?></u></h2>
                        </div>
                        <div class="col-sm-4 col-sm-offset-4">
                            <p><a class="btn btn-info pull-right" href="?p=listeArt&pay=<?=  $value['pay_oid']; ?>">Découvrir</a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="text-center">
            <ul class="pagination valider"></ul>
        </div>
    </div>
</div>

<script type="text/javascript" src="./assets/js/paginationCom.js"></script>
