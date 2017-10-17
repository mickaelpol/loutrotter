<?php
if(empty($_GET['art'])){
    header("Location: ?p=accueil");
}
$req = sprintf("select * from art_article where art_oid = %d",$_GET['art']);
$result = $bdd->query($req)->fetch();

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
                <h3 class='titre'><i class="fa fa-map-signs" aria-hidden="true"></i>
                Lieux</h3>
                <p class='text-left'>
                    <?= $result['art_contenu_lieux'] ?>
                </p>

            </div>
            <div class="row">
                <h3 class='titre text-right'>Monument<i class="fa fa-university" aria-hidden="true"></i>
                </h3>
                <p class='text-right'>
                    <?= $result['art_contenu_monuments'] ?>

                </p>
            </div>
            <div class="row">
                <h3 class='titre'>Culture</h3>
                <p class='text-left'>
                    <?= $result['art_contenu_culture'] ?>

                </p>
            </div>
            <div class='row insta'>
                <?= htmlspecialchars_decode($result['art_lieninsta'],ENT_QUOTES)?>
            </div>
        </section>

    </div>
</main>
