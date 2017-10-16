<?php 
$btnUser = isset($_SESSION['nom']) ? "<a href='?p=profil'>". $_SESSION['nom'] . "</a>" : '<a href="?p=connection"><i class="fa fa-user" aria-hidden="true"></i> se connecter</a>';

$btnCo = isset($_SESSION['nom']) ? '<a href="?p=deco"><i class="fa fa-power-off" aria-hidden="true"></i></a>' : '<a href="?p=inscription"><i class="fa fa-user-plus" aria-hidden="true"></i> s\'inscrire</a>';

$btnAdmin = "";
if (isset($_SESSION['admin'])) {
    $btnAdmin = $_SESSION['admin'] === '0' ? '' : '<a href="?p=admin"><i class="fa fa-cogs" aria-hidden="true"></i>'. ' ADMIN'. '</a>';
}

?>


<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <nav class="hidden-xs navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="glyphicon glyphicon-th-list"></span>
            </a>

            <ul class="dropdown-menu list-inline valider nav navbar-nav">
              <div class="col-sm-2 text-center text-uppercase cont">
                <li class="activé"><a href="?p=listPays&cont=5">Europe</a></li>
              </div>

              <div class="col-sm-2 text-center text-uppercase cont">
                <li><a href="?p=listPays&cont=2">Amérique du Nord</a></li>
              </div>

              <div class="col-sm-2 text-center text-uppercase cont">
                <li><a href="?p=listPays&cont=3">Amérique du Sud</a></li>
              </div>

              <div class="col-sm-2 text-center text-uppercase cont">
                <li><a href="?p=listPays&cont=4">Asie</a></li>
              </div>

              <div class="col-sm-2 text-center text-uppercase cont">
                <li><a href="?p=listPays&cont=1">Afrique</a></li>
              </div>

              <div class="col-sm-2 text-center text-uppercase cont">
                <li><a href="?p=listPays&cont=6">Océanie</a></li>
              </div>
            </ul>
          </div>

          <ul class="nav navbar-nav">
            <li class="active"><a href="#">
              <img class="Logo" src="assets/img/Logo_Loutrotter.png" alt="Logo_Loutrotter">
            </a></li>
            <li><a href="#">Contact</a></li>
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
            <li> <?= $btnUser ?></li>
            <li><?= $btnCo ?></li>
            <li><?= $btnAdmin ?></li> 
        </ul>
        </div>
      </nav>


    </div>
  </div>

    <div class="visible-xs">
      <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="glyphicon glyphicon-th-list">
              </button>
              <a class="navbar-brand" href="#">Loutrotter</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Contact</a></li>
                <div class="col-xs-12">
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
                </div>
                <li> <?= $btnUser ?></li>
                <li><?= $btnCo ?></li>
                <li><?= $btnAdmin ?></li>
              </div>
            </ul>
          </div>
        </nav>
      </div>
    
