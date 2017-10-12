<?php 
session_start();
include("connectionDb/connection.php");

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
        include('pages/listArticle.php');
    }

//////////// SI LA VARIABLE SÉTÉ VAUT CONTACT ALORS ON INCLUE LA PAGE CONTACT DANS $CONTENT//////// ///
    if($p === 'contact'){
        include('pages/contact.php');
    }

//////////// SI LA VARIABLE SÉTÉ VAUT CONNECTION ALORS ON INCLUE LA PAGE CONNECTION DANS $CONTENT//////// ///
    if($p === 'connection'){
        include('pages/connection.php');
    }
//////////// SI LA VARIABLE SÉTÉ VAUT AJOUT-ARTICLE ALORS ON INCLUE LA PAGE D'AJOUT ARTICLE DANS $CONTENT//////// ///
if($p === 'ajout-article'){
    include('pages/ajoutArticle.php');
}

//////////// SI LA VARIABLE SÉTÉ VAUT INSCRIPTION ALORS ON INCLUE LA PAGE INSCRIPTION DANS $CONTENT//////// ///
    if($p === 'inscription'){
        include('pages/inscription.php');
    }

//////////// SI LA VARIABLE SÉTÉ VAUT ADDPAYS ALORS ON INCLUE LA PAGE ADDPAYS DANS $CONTENT//////// ///
    if($p=== 'addPays'){
        include('pages/addpays.php');
    }

    if($p==='traitement-ajout-article'){
        include('pages/bddAjoutArticle.php');
    }

//////////// SI LA VARIABLE SÉTÉ VAUT ADDPAYS ALORS ON INCLUE LA PAGE ADDPAYS DANS $CONTENT//////// ///
    if($p=== 'listPays'){
        include('pages/listPays.php');
    }
    if($p=== 'admin'){
        include('pages/admin.php');
    }
    if($p=== 'bdd-suppression-article'){
        include('pages/bddSupressionArticle.php');
    }
    if($p=== 'article'){
        include('pages/article.php');
    }

    if($p=== 'edit-article'){
        include('pages/editArticle.php');
    }
    if($p=== 'update-article'){
        include('pages/bddUpdateArticle.php');
    }
    

$content = ob_get_clean();
include('pages/templates/default.php');