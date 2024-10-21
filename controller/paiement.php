<?php

// ******Supprimer client**********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM paiement_carte WHERE id_op=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer client**********************************************

require_once('../../model/connexion.php');
// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['envoie2'])) {

		$num_carte=htmlspecialchars($_POST['carte']);
		$nbre_pain=htmlspecialchars($_POST['nbre_pain']);
		$montant_2=htmlspecialchars($_POST['montant_2']);

		$requser=$pdo->prepare("SELECT * FROM carte WHERE num_carte=?");
		$requser->execute(array($num_carte));
		$infocarte=$requser->fetch();
		if ($montant_2<=$infocarte['montant']) {
			
			$bp=$infocarte['montant']-$montant_2;
			$net=($montant_2/4);
		
		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO paiement_carte(num_carte,client,montant,nbre_pain,montant2,bp,net,date)VALUES(?,?,?,?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_carte,$infocarte['client'],$infocarte['montant'],$nbre_pain,$montant_2,$bp,$net,date('Y-m-d'));
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}

	}else{
		$errors['cool']="Il y ' a un problème! la valeur entrée est supérieur au montant à enregistrer!";
	}
				 	
}
// *************End Insert client**************************************

// *************Edition client*******************************************
if (isset($_GET['dk'])) {
		
		$requser=$pdo->prepare("SELECT * FROM paiement_carte WHERE id=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['envoie5'])) {

		$enteprise=htmlspecialchars($_POST['entreprise']);
		$paiement_carte=htmlspecialchars($_POST['num_paiement_carte']);

	    //Création de l'objet prepare et envoie de la requête
	    $ps=$pdo->prepare("UPDATE paiement_carte SET entreprise=?,num_paiement_carte=? WHERE id=?");
	    //Pour bien recupere les données on crée un table de parametre
	    $params=array($enteprise,$paiement_carte,$_GET['dk']);
	    //Execution de la requête par leur paramètre en ordre 
	    $ps->execute($params);

		 $success['cool']="Modification effectuée avec succès!";
		
        }
	}
// *************Edition client**************************************

	//*************************Imprimer**********************************

	$dates=isset($_GET['date'])?$_GET['date']:"";
	$requeteprint="SELECT * FROM paiement_carte WHERE date LIKE '%$dates%'";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************