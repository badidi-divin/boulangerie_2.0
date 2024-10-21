<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";

	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM commande WHERE client LIKE '%$mot1%'";	
		
		
	}else{
		$requete="SELECT * FROM commande";	
	}
	$resultat=$pdo->query($requete);