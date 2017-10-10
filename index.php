<?php 
session_start();


////////////////////////////////////// SI LE $_GET DE P EST SÉTÉ ////////////////////////////////////
    if(isset($_GET['p'])){
////////////////////// ////////  ALORS ELLE VAUDRAT BIEN LA VALEUR PASSÉ ////////////////////////////
        $p = $_GET['p'];
    } else {
// ////////////////  SINON ELLE RENVERRA AUTOMATIQUEMENT VERS LA PAGE ACCUEIL DU SITE ////////////////
        $p = 'accueil';
    }

// /////////////////////////  MISE EN MEMOIRE TAMPON DES VALEURS DE LA PAGE /////////////////////////
    ob_start();


////// /// SI LA VARIABLE SÉTÉ VAUT ACCUEIL ALORS ON INCLUE LA PAGE ACCUEIL DANS LE $CONTENT  ///////
    if($p === 'accueil'){
        include('pages/accueil.php');
    }

////// SI LA VARIABLE SÉTÉ VAUT LISTEART ALORS ON INCLUE LA PAGE LISTE DES ARTICLES DANS $CONTENT ////
    if($p === 'listeArt'){
        include('pages/listeArticles.php');
    }

//////////// SI LA VARIABLE SÉTÉ VAUT CONTACT ALORS ON INCLUE LA PAGE CONTACT DANS $CONTENT//////// ///
    if($p === 'contact'){
        include('pages/contact.php');
    }

//////////// SI LA VARIABLE SÉTÉ VAUT CONNECTION ALORS ON INCLUE LA PAGE CONNECTION DANS $CONTENT//////// ///
    if($p === 'connection'){
        include('pages/connection.php');
    }


$content = ob_get_clean();
include('pages/templates/default.php');