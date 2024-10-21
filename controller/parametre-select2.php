<?php 

	$requser=$pdo->prepare("SELECT * FROM parametre");
	$requser->execute();
	$userinfo=$requser->fetch();
	