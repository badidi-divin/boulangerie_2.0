<?php

// ******Supprimer client**********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM fournisseur WHERE id=?");

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
		$requete="SELECT * FROM fournisseur WHERE nom_complet LIKE '%$mot1%' AND date LIKE '%$mot2%'";			
	}else{
		$requete="SELECT * FROM fournisseur";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['envoie2'])) {

		$nom_complet=htmlspecialchars($_POST['nom_complet']);
		$type=htmlspecialchars($_POST['type']);
		$email=htmlspecialchars($_POST['email']);
		$telephone=htmlspecialchars($_POST['phone']);
		$adresse=htmlspecialchars($_POST['adresse']);

		
		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO fournisseur(nom_complet,type,telephone,email,adresse)VALUES(?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom_complet,$type,$telephone,$email,$adresse);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}
				 	
	}
// *************End Insert client**************************************

// *************Edition client*******************************************
if (isset($_GET['dk'])) {
		
		$requser=$pdo->prepare("SELECT * FROM fournisseur WHERE id=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['envoie4'])) {

		$nom_complet=htmlspecialchars($_POST['nom_complet']);
		$type=htmlspecialchars($_POST['type']);
		$email=htmlspecialchars($_POST['email']);
		$telephone=htmlspecialchars($_POST['phone']);
		$adresse=htmlspecialchars($_POST['adresse']);

		if (strlen($nom_complet > 5) AND strlen($nom_complet <30)){
			$errors['password']="Votre nom_complet doit avoir 5 à 20 caractères!";
		}

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE fournisseur SET nom_complet=?,type=?,telephone=?,email=?,adresse=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom_complet,$type,$telephone,$email,$adresse,$_GET['dk']);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Modification effectuée avec succès!";
		}

	}
				 	
	}
// *************Edition client**************************************

	//*************************Imprimer**********************************

	$dates=isset($_GET['dates'])?$_GET['dates']:"";
	$requeteprint="SELECT * FROM fournisseur WHERE date LIKE '%$dates%'";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************