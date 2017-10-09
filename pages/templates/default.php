<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- /////////////////////// DESCRIPTION A FINIR DE REMPLIR /////////////////////////// -->
    <meta name="description" content="contenu de la description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/police.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- ////////////////////// BALISE TITLE A FINIR DE REMPLIR /////////////////////////// -->
    <title>Loutrotter voyages partage découverte cuisine continent pays avion vol bateau </title> 
</head>


<body>

<!--////////////// INCLUDE DE LA NAVBAR AFIN DE PAS LA REPETER DANS LES AUTRES PAGES //////////////-->
    <?php include('navbar.php'); ?>
    
<!--/////////////// INCLUDE DU CONTENU DE LA PAGE PAR L'INDEX.PHP /////////////////////////////////-->
    <?= $content ?>

<!--////////////////// INCLUDE DU FOOTER AFIN DE PAS LE REPETER SUR CHAQUE PAGES //////////////////-->
    <?php include('footer.php'); ?>
    <script src="node_modules/jquery/dist/jquery.js"></script>
</body>
</html>