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
<section class='col-sm-offset-2 col-sm-8'>
<div class="row">
<h3 class='titre'><i class="fa fa-map-signs" aria-hidden="true"></i>
Lieux</h3>
<p class='text-left'>
    <?= $result['art_contenu_lieux'] ?>

</div>
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
</section>
</main>
