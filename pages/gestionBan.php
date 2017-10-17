<?php


if (!isset($_SESSION['admin'])) {
    header("Location: ?p=accueil");
} else {
    if ($_SESSION['admin'] === "0") {
        header("Location: ?p=accueil");
    }
}

$utiId = $_GET['uti'];
var_dump($utiId);

$sqlUser = sprintf('SELECT * FROM uti_utilisateur WHERE uti_oid = %d', $utiId);
$reponse = $bdd->query($sqlUser);
$donnees = $reponse->fetch();

if ($donnees['uti_isbanned'] === '0') {
    $sql = sprintf('UPDATE uti_utilisateur
        SET uti_isbanned = 1
        WHERE uti_oid = %d', $utiId);
}else{
    $sql = sprintf('UPDATE uti_utilisateur
        SET uti_isbanned = 0
        WHERE uti_oid = %d', $utiId);
}
try{
    $bdd->query($sql);
    ?>
    <h4 class='text-center'>Utilisateur modifié avec succès<h4>
        <br>
        <p class='text-center'>redirection en cours<p>
            <br>
            <div class="container">
                <div class="row">
                    <div id="loading" class='loader'></div>
                </div>
            </div>
            <?php
            header('refresh:3;url=?p=listeUsr');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        };
        ?>
