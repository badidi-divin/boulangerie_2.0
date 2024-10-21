<?php 
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');

    $mot1=isset($_GET['nom'])?$_GET['nom']:"";
    $mot2=isset($_GET['dates'])?$_GET['dates']:"";

    $requete="SELECT * FROM plat WHERE type LIKE '%$mot1%' AND date_entree LIKE '%$mot2%'";           

    $resultat=$pdo->query($requete);

    

    // ********************Fin**********************************