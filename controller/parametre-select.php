<?php 
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');
    $requete="SELECT * FROM parametre";
    $resultat=$pdo->query($requete);

    // ********************Fin**********************************