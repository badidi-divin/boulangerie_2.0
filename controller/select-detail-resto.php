<?php

   $id=$_GET['id'];
	$requete="SELECT * FROM detail_commande_resto WHERE code_commande='$id'";		
	$resultat=$pdo->query($requete);