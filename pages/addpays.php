<?php
    $selecteur =  $bdd->query("select * from con_continent")->fetchAll();
    if(!empty($_POST['name'])){
        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $request = sprintf("Insert into pay_pays (pay_nom, pay_con_oid) values ('%s', %d )",$name,$_POST['continent']);
        $bdd->query($request);
        echo 'pays ajouté';        
    }else{
        echo 'veuillez renseigner le nom du pays';
    }
?>

<header class="page-header container text-center">
    <h1 class='titre col-sm-offset-4 col-sm-4'>Ajouter un Pays</h1>
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