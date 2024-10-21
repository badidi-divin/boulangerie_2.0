<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";

	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM commande_resto WHERE tables LIKE '%$mot1%'";	
		
		
	}else{
		$requete="SELECT * FROM commande_resto";	
	}
	$resultat=$pdo->query($requete);