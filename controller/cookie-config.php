<?php 
	require_once('../../model/connexion.php');

	if (!isset($_SESSION['id']) AND isset($_COOKIE['username'],$_COOKIE['password']) AND !empty($_COOKIE['username']) AND !empty($_COOKIE['password'])) {

		$requiser=$pdo->prepare("SELECT * FROM user WHERE username=? AND password=?");
		$requiser->execute(array($_COOKIE['username'],$_COOKIE['password']));
		// rowCount permet de compter le nombre saisie par le user
		$userexist=$requiser->rowCount();
		
		if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id']=$userinfo['id'];
				$_SESSION['username']=$userinfo['username'];
				$_SESSION['password']=$userinfo['password'];
				$_SESSION['role']=$userinfo['role'];
				header("Location:rapport.php");		
			}
	}
	

	