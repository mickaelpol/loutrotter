<?php 
$comId = $_GET['id'];

$requete = sprintf('DELETE FROM com_commentaire WHERE com_oid = %d', $comId);
$bdd->query($requete);
header('Location: ?p=listCom&id='.$_GET['art']);
?>

