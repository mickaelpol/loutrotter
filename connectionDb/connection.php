<?php 

///////////////////////////// INCLUDE DES FICHIERS PARAMETRES DE LA DB ///////////////////////////
include('./config/parameters.php');


try {
    // ///CONNECTION A LA DB (SI CONNECTION AVEC MYSQL RETIRER LES ESPACES ET SÉPARÉ PAR DES POINT VIRGULE ) ///
    $bdd = new PDO("mysql:host=$serverDb port=$portDb dbname=$nameDb user=$userDb password=$pwdDb");
} 
    // ////// SI UNE ERREUR SURVIENT LE CATCH STOPPE TOUTE REQUETE ET RENVOI UN MESSAGE D'ERREUR //////
catch (Exception $e) {
    // //////////////////////////////// AFFICHAGE DE  L'ERREUR ////////////////////////////////
        die ("Erreur : " .$e->getMessage());
}

?>