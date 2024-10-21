<?php 
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');

    $mot1=isset($_GET['de'])?$_GET['de']:"";

    $mot2=isset($_GET['a'])?$_GET['a']:"";

    $requete="SELECT * FROM detail_commande WHERE date>='$mot1' AND date<='$mot2' ORDER BY date";           

    $resultat=$pdo->query($requete);
