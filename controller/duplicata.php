<?php
    //*************selection de la commande*************************** */
    $id_com=$_GET['id'];
    $requser=$pdo->prepare("SELECT * FROM commande WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo2=$requser->fetch();
    //*************Fin de la selection de la commande*************************** */

    //*************selection de la commande*************************** */
    $requete="SELECT * FROM detail_commande WHERE code_commande='$id_com'";	
	$resultat=$pdo->query($requete);
    //*************Fin de la selection de la commande*************************** */