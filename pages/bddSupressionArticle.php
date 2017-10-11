<?php
$articleID=htmlspecialchars((INT)$_POST['suppr-article']);

$sql_supression_article= sprintf('DELETE FROM art_article WHERE art_oid = %d', $articleID);

try{
    $bdd->query($sql_supression_article);
    ?>
    <h4 class='text-center'>Article supprimé avec succès<h4>
    <br>
    <p class='text-center'>redirection en cours<p>
    <br>
    <div class="container">
        <div class="row">
            <div id="loading" class='loader'></div>
        </div>
    </div>
    <?php
    header('refresh:3;url=?p=admin');
} catch (Exception $e){
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

?>