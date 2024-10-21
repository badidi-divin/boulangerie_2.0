<?php 
	require_once('../../model/connexion.php');

   	$mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM client WHERE nom_complet LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM client";	
	}
	$resultat=$pdo->query($requete);