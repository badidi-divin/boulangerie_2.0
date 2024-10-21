<?php

// ******Supprimer entree**********************************************
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM entree WHERE id=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer entree**********************************************

// ********************Affichage des entrees****************************
	require_once('../../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
   $mot2=isset($_GET['mot2'])?$_GET['mot2']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM entree WHERE produit LIKE '%$mot1%' AND dates LIKE '%$mot2%'";			
	}else{
		$requete="SELECT * FROM entree";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des entrees************************

// *************Insert entree*******************************************
	$errors=array();
	$success=array();

if (isset($_POST['envoie2'])) {

		$num_piece=htmlspecialchars($_POST['num_piece']);
		$produit=htmlspecialchars($_POST['produit']);
		$nbre_paquet=htmlspecialchars($_POST['nbre_paquet']);
		$nbre_piece=htmlspecialchars($_POST['nbre_piece']);
		$qte_total=$nbre_paquet*$nbre_piece;
		$pu_paquet=htmlspecialchars($_POST['pu_paquet']);
		$total=$pu_paquet*$nbre_paquet;
		$pa_unit=$pu_paquet/$nbre_piece;
		$pt_pa=$pa_unit*$qte_total;
		$pt_pv=$pv_unit*$qte_total;

		if (strlen($produit > 5) AND strlen($produit <30)){
			$errors['password']="Votre produit doit avoir 5 à 20 caractères!";
		}
		 $req=$pdo->prepare('SELECT id FROM plat WHERE designation=?');
                    $req->execute([$_POST['designation']]);
                    $user=$req->fetch();
                    if ($user) {
                        $errors['password']='Ce nom est déjà attribuer à un autre produit';
                    }

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO entree(num_piece,produit,nbre_paquet,nbre_piece,qte_total,pu_paquet,total,dates)VALUES(?,?,?,?,?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_piece,$produit,$nbre_paquet,$nbre_piece,$email,$adresse);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);

		    $req2=$pdo->prepare('SELECT id FROM plat WHERE designation=?');
                    $req2->execute([$_POST['designation']]);
                    $user=$req2->fetch();
                    if (!$user) {
                        //Création de l'objet prepare et envoie de la requête
					    $ps=$pdo->prepare("INSERT INTO plat(designation,qte_stock,pa,pv)VALUES(?,?,?,?)");
					    //Pour bien recupere les données on crée un table de parametre
					    $params=array($produit,$qte_total,$pa_unit,$pv_unit,$adresse);
					    //Execution de la requête par leur paramètre en ordre 
					    $ps->execute($params);
                    }

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO entree(num_piece,produit,nbre_paquet,nbre_piece,qte_total,pu_paquet,total,dates)VALUES(?,?,?,?,?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_piece,$produit,$nbre_paquet,$nbre_piece,$email,$adresse);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Enregistrement effectué avec succès!";
		}
				 	
	}
// *************End Insert entree**************************************

// *************Edition entree*******************************************
if (isset($_GET['dk'])) {
		
		$requser=$pdo->prepare("SELECT * FROM entree WHERE id=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();

		if (isset($_POST['envoie4'])) {

		$produit=htmlspecialchars($_POST['produit']);
		$sexe=htmlspecialchars($_POST['sexe']);
		$email=htmlspecialchars($_POST['email']);
		$telephone=htmlspecialchars($_POST['phone']);
		$adresse=htmlspecialchars($_POST['adresse']);

		if (strlen($produit > 5) AND strlen($produit <30)){
			$errors['password']="Votre produit doit avoir 5 à 20 caractères!";
		}

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPdates entree SET produit=?,sexe=?,telephone=?,email=?,adresse=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($produit,$sexe,$telephone,$email,$adresse,$_GET['dk']);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			 
			 $success['cool']="Modification effectuée avec succès!";
		}

	}
				 	
	}
// *************Edition entree**************************************

	//*************************Imprimer**********************************

	$datess=isset($_GET['datess'])?$_GET['datess']:"";
	$requeteprint="SELECT * FROM entree WHERE dates LIKE '%$datess%'";	
	$resultatprint=$pdo->query($requeteprint);

// ************************End **************************************