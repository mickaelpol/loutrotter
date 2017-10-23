<?php
$btnUser = isset($_SESSION['nom']) ? "<a href='?p=profil'>". $_SESSION['nom'] . "</a>" : '<a href="?p=connection"><i class="fa fa-user" aria-hidden="true"></i> se connecter</a>';

$btnCo = isset($_SESSION['nom']) ? '<a href="?p=deco"><i class="fa fa-power-off" aria-hidden="true"></i></a>' : '<a href="?p=inscription"><i class="fa fa-user-plus" aria-hidden="true"></i> s\'inscrire</a>';

$btnAdmin = "";
if (isset($_SESSION['admin'])) {
    $btnAdmin = $_SESSION['admin'] === '0' ? '' : '<a href="?p=admin"><i class="fa fa-cogs" aria-hidden="true"></i>'. ' ADMIN'. '</a>';
}

?>


<div class="row">

      <nav class="hidden-xs navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="glyphicon glyphicon-th-list"></span>
            </a>

            <ul class="dropdown-menu list-inline valider nav navbar-nav animated fadeInLeft">
              <div class="col-sm-2 text-center text-uppercase cont">
                <li><a href="?p=listPays&cont=5">Europe</a></li>
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
            <li class="active"><a href="?p=accueil">
              <img class="Logo" src="assets/img/Logo_Loutrotter.png" alt="Logo_Loutrotter">
            </a></li>
            <li><a href="?p=contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" action="?p=recherche" method="POST">
              <div class="input-group">
                <input name="s" type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                      <button class="btn valider" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                      </button>
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

    <div class="visible-xs">
      <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="glyphicon glyphicon-th-list">
            </button>

            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                  <div class="col-xs-12">
                    <form class="navbar-form navbar-left" action="?p=recherche" method="POST">
                      <div class="input-group">
                        <input name="s" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn valider" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <li><a href="?p=accueil">Loutrotter</a></li>
                  <li><a href="?p=contact">Contact</a></li>
                  <li> <?= $btnUser ?></li>
                  <li><?= $btnCo ?></li>
                  <li><?= $btnAdmin ?></li>
                  <li>
                    <a data-toggle="collapse" data-target="#continent"><i class="fa fa-globe" aria-hidden="true"></i> Continent</a>
                      <div id="continent" class="collapse">
                        <ul class="list-inline margeIco">
                          <div class="col-xs-2">
                            <li><a href="?p=listPays&cont=5"><i class="mg map-wrld-eu mg-2x"></i></a></li>
                          </div>
                          <div class="col-xs-2">
                            <li><a href="?p=listPays&cont=2"><i class="mg map-wrld-na mg-2x"></i></a></li>
                          </div>
                          <div class="col-xs-2">
                            <li><a href="?p=listPays&cont=3"><i class="mg map-wrld-sa mg-2x"></i></a></li>
                          </div>
                          <div class="col-xs-2">
                            <li><a href="?p=listPays&cont=4"><i class="mg map-wrld-as mg-2x"></i></a></li>
                          </div>
                          <div class="col-xs-2">
                            <li><a href="?p=listPays&cont=1"><i class="mg map-wrld-af mg-2x"></i></a></li>
                          </div>
                          <div class="col-xs-2">
                            <li><a href="?p=listPays&cont=6"><i class="mg map-wrld-oc mg-2x"></i></a></li>
                          </div>
                        </ul>
                    </div>
                    </li>
                </div>
              </ul>
          </div>
        </nav>
      </div>
