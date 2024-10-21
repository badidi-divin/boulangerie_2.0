<?php 
	
	$requser=$pdo->prepare("SELECT * FROM client WHERE id=?");
	$requser->execute(array($_SESSION['cli_id']));
	$userinfo2=$requser->fetch();
