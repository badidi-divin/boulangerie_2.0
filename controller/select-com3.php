<?php
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');

    $mot1=isset($_GET['de'])?$_GET['de']:"";

    $mot2=isset($_GET['a'])?$_GET['a']:"";

    $requete="SELECT * FROM commande WHERE dates>='$mot1' AND dates<='$mot2' ORDER BY dates";           

    $resultat=$pdo->query($requete);