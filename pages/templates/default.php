<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- /////////////////////// DESCRIPTION A FINIR DE REMPLIR /////////////////////////// -->
    <meta name="description" content="contenu de la description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="assets/img/Logo_Loutrotter.png"/>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/police.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/mapglyphs-free-2.0/mapglyphs-free-2.0/mapglyphs/2.0/mapglyphs.css" rel="stylesheet">
    <!-- ////////////////////// BALISE TITLE A FINIR DE REMPLIR /////////////////////////// -->
    <title>Loutrotter, voyages</title>
</head>


<body>

    <!--////////////// INCLUDE DE LA NAVBAR AFIN DE PAS LA REPETER DANS LES AUTRES PAGES //////////////-->
    <?php include('navbar.php'); ?>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="node_modules/list.js/dist/list.js" ></script>
    <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!--/////////////// INCLUDE DU CONTENU DE LA PAGE PAR L'INDEX.PHP /////////////////////////////////-->
    <?= $content ?>

    <!--////////////////// INCLUDE DU FOOTER AFIN DE PAS LE REPETER SUR CHAQUE PAGES //////////////////-->
    <?php include('footer.php'); ?>
</body>
</html>
