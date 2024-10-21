<?php

   $id=$_GET['id'];
	$requete="SELECT * FROM detail_proforma WHERE code='$id'";		
	$resultat=$pdo->query($requete);