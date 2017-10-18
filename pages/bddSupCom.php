<?php 
if (!isset($_SESSION['admin'])) {
    header("Location: ?p=accueil");
} else {
    if ($_SESSION['admin'] === "0") {
        header("Location: ?p=accueil");
    }
}
$comId = $_GET['id'];

$requete = sprintf('DELETE FROM com_commentaire WHERE com_oid = %d', $comId);
$bdd->query($requete);
header('Location: ?p=listCom&id='.$_GET['art']);
?>

