<?php 
	require_once('../../model/connexion.php');
	$requiser=$pdo->prepare("SELECT * FROM parametre");
	$requiser->execute();
	// rowCount permet de compter le nombre saisie par le user
	$userexist=$requiser->rowCount();
		if ($userexist==1) {
			header("Location:index.php");		
		}else{
			header("Location:parametre.php");
		}