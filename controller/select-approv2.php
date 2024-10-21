<?php 
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');

    $mot1=isset($_GET['de'])?$_GET['de']:"";

    $mot2=isset($_GET['a'])?$_GET['a']:"";

    $requete="SELECT * FROM plat WHERE date_entree>='$mot1' AND date_entree<='$mot2' ORDER BY date_entree";           

    $resultat=$pdo->query($requete);