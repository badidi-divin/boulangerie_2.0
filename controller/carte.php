<?php

// ******Supprimer client**********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM carte WHERE num_carte=?");

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
		$requete="SELECT * FROM carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%'";			
	}else{
		$requete="SELECT * FROM carte";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// *************Insert client*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['envoie2'])) {

		$client=htmlspecialchars($_POST['client']);
		$montant=htmlspecialchars($_POST['montant']);

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO carte(client,montant,date)VALUES(?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($client,$montant,date('Y-m-d'));
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}
				 	
	}
// *************End Insert client**************************************

// *************Edition client*******************************************
if (isset($_GET['dk'])) {
		
		$requser=$pdo->prepare("SELECT * FROM carte WHERE num_carte=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['envoie5'])) {

		$client=htmlspecialchars($_POST['client']);
		$montant=htmlspecialchars($_POST['montant']);

	    //Création de l'objet prepare et envoie de la requête
	    $ps=$pdo->prepare("UPDATE carte SET client=?,montant=?,date=? WHERE num_carte=?");
	    //Pour bien recupere les données on crée un table de parametre
	    $params=array($client,$montant,date('Y-m-d'),$_GET['dk']);
	    //Execution de la requête par leur paramètre en ordre 
	    $ps->execute($params);

		 $success['cool']="Modification effectuée avec succès!";
		
        }
	}
// *************Edition client**************************************

	//*************************Imprimer**********************************

	$dates=isset($_GET['date'])?$_GET['date']:"";
	$requeteprint="SELECT * FROM carte WHERE date LIKE '%$dates%'";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************