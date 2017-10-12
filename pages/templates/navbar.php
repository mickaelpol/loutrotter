<?php 
$btnUser = isset($_SESSION['nom']) ? "<a href='?p=profil'>". $_SESSION['nom'] . "</a>" : '<a href="?p=connection"><i class="fa fa-user" aria-hidden="true"></i> se connecter</a>';

$btnCo = isset($_SESSION['nom']) ? '<a href="?p=deco"><i class="fa fa-power-off" aria-hidden="true"></i></a>' : '<a href="?p=inscription"><i class="fa fa-user-plus" aria-hidden="true"></i> s\'inscrire</a>';

$btnAdmin = "";
if (isset($_SESSION['admin'])) {
    $btnAdmin = $_SESSION['admin'] === '0' ? '' : '<a href="?p=admin"><i class="fa fa-cogs" aria-hidden="true"></i>'. ' ADMIN'. '</a>';
}

?>
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">
                <span class="glyphicon glyphicon-th-list"></a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="?p=accueil">
                        <img class="Logo" src="assets/img/Logo_Loutrotter.png" alt="Logo_Loutrotter">
                    </a></li>
                    <li><a href="">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" action="" method="post">
                        <div class="input-group">
                            <input name="s" type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <a class="btn" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                    <li><?= $btnUser ?></li>
                    <li><?= $btnCo ?></li>
                    <li><?= $btnAdmin ?></li>
                </ul>
            </div>
        </nav>
