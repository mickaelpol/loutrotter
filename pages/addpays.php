<?php

if (!isset($_SESSION['admin'])) {
    header("Location: ?p=accueil");
} else {
    if ($_SESSION['admin'] === "0") {
        header("Location: ?p=accueil");
    }
}

$selecteur =  $bdd->query("select * from con_continent")->fetchAll();
if(!empty($_POST['name'])){
    $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
    $request = sprintf("Insert into pay_pays (pay_nom, pay_con_oid) values ('%s', %d )",$name,$_POST['continent']);
    $bdd->query($request);
    $message = '<div class="row"><p class="text-success text-center">Le pays à bien été ajouté, Redirection en cours</p></div>';
    $loader = '<div class="row">
    <div id="loading" class="loader"></div>
    </div>';
    header('refresh:3;url=?p=admin');
}else{
    $message =  '<div class="row"><p class="text-center">Veuillez renseigner le nom du pays</p></div>';
}
?>

<header class="page-header container text-center">
    <div class="col-sm-12">
        <h1 class='titre col-sm-offset-4 col-sm-4'>Ajouter un Pays</h1>
    </div>
    <p class="text-center"><?= $message ?></p>
    <p class="text-center"><?= isset($loader) ? $loader: "" ?></p>
</header>
<div class="container">
    <form class='col-sm-offset-4 col-sm-4' action="" method="POST">
        <div class="form-group">
            <label for="continent">Continent</label>
            <select name="continent" id="continent" class="form-control">
                <optgroup label="Continent">
                    <?php foreach ($selecteur as $key => $value) :?>
                        <option value= <?= $value["con_oid"] ?>> <?= $value["con_nom"] ?> </option>
                    <?php endforeach ?>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nom du pays</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <input type="submit" value="Valider" class="btn valider">
        </div>
    </form>
</div>
