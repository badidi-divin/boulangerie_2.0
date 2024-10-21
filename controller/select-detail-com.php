<?php

   $id=$_GET['id'];
	$requete="SELECT * FROM detail_commande WHERE code_commande='$id'";		
	$resultat=$pdo->query($requete);