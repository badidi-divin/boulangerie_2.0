cc<?php

// ******Supprimer client**********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM facture WHERE id=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer client**********************************************

// ********************Affichage des clients****************************
	require_once('../../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
   $mot2=isset($_GET['mot2'])?$_GET['mot2']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM facture WHERE num_facture LIKE '%$mot1%' AND date LIKE '%$mot2%'";			
	}else{
		$requete="SELECT * FROM facture";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['envoie2'])) {

		$entreprise=htmlspecialchars($_POST['entreprise']);
		$num_facture=htmlspecialchars($_POST['num_facture']);

		
		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO facture(entreprise,num_facture)VALUES(?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($entreprise,$num_facture);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}
				 	
	}
// *************End Insert client**************************************

// *************Edition client*******************************************
if (isset($_GET['dk'])) {
		
		$requser=$pdo->prepare("SELECT * FROM facture WHERE id=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['envoie5'])) {

		$enteprise=htmlspecialchars($_POST['entreprise']);
		$facture=htmlspecialchars($_POST['num_facture']);

	    //Création de l'objet prepare et envoie de la requête
	    $ps=$pdo->prepare("UPDATE facture SET entreprise=?,num_facture=? WHERE id=?");
	    //Pour bien recupere les données on crée un table de parametre
	    $params=array($enteprise,$facture,$_GET['dk']);
	    //Execution de la requête par leur paramètre en ordre 
	    $ps->execute($params);

		 $success['cool']="Modification effectuée avec succès!";
		
        }
	}
// *************Edition client**************************************

	//*************************Imprimer**********************************

	$dates=isset($_GET['date'])?$_GET['date']:"";
	$requeteprint="SELECT * FROM facture WHERE date LIKE '%$dates%'";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************