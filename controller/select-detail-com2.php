<?php

	$id1=isset($_GET['date1'])?$_GET['date1']:"";
	$id2=isset($_GET['date2'])?$_GET['date2']:"";
	$requete="SELECT * FROM detail_commande WHERE date>='$id1' AND date<='$id2' ORDER BY date";		
	$resultat=$pdo->query($requete);