<?php 
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');

    $mot1=isset($_GET['nom'])?$_GET['nom']:"";
    $mot2=isset($_GET['dates'])?$_GET['dates']:"";

    $requete="SELECT * FROM commande WHERE client LIKE '%$mot1%' AND dates LIKE '%$mot2%'";           

    $resultat=$pdo->query($requete);

    

    // ********************Fin**********************************