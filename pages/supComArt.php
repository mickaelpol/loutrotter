<?php 
if (!isset($_SESSION['id'])) {
    header("Location: ?p=accueil");
} 
$comId = $_GET['id'];

$requete = sprintf('DELETE FROM com_commentaire WHERE com_oid = %d', $comId);
$bdd->query($requete);
header('Location: ?p=article&art='.$_GET['art']);
?>

