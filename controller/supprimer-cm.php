<?php 
	//Récuperation du paramètre URL appelé code
	$id=$_GET['id'];
	require_once('../model/connexion.php');
	 //*************selection de la commande*************************** */
	 $requete="SELECT * FROM detail_commande WHERE code_commande='$id'";	
	 $resultat=$pdo->query($requete);
	 //*************Fin de la selection de la commande*************************** */
	 while ($et=$resultat->fetch()){
	
		$product=$et['plat'];
		$quantity=$et['qte_com'];
		$prix=$et['prix'];
		 // ***********recherche***********************
		 $requser=$pdo->prepare("SELECT * FROM plat WHERE designation=?");
		 $requser->execute(array($product));
		 $userinfo5=$requser->fetch();

		 $requser=$pdo->prepare("SELECT * FROM stock WHERE designation=?");
		 $requser->execute(array($product));
		 $userinfo6=$requser->fetch();

		 $n_q=$userinfo6['qte_stock']+$quantity;
	
		// *****modification*******************************************
		$ps1=$pdo->prepare("UPDATE stock SET qte_stock=? WHERE designation=?");
		//Pour bien recupere les données on crée un table de parametre
		$params2=array($n_q,$product);
		//Execution de la requête par leur paramètre en ordre 
		$ps1->execute($params2);

	 }
	// **********************Fin**************************************
	

	// ***********Suppression de la commande*******************************

	$ps=$pdo->prepare("DELETE FROM commande WHERE id=?");

	$params=array($id);

	$ps->execute($params);

	/**************Suppression de detail de la commande */

	$ps2=$pdo->prepare("DELETE FROM detail_commande WHERE code_commande=?");

	$params2=array($id);

	$ps2->execute($params2);

	/*****Recupération de produits decrementer********************** */

	 //*************selection de la commande*************************** */

 
	
	
	header("location:".$_SERVER['HTTP_REFERER']);