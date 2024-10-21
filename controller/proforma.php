<?php 
	
    // *****************Ajout commande *****************************
	if(isset($_POST['envoie2'])){
	// require_once('../model/connexion.php');
	// require_once('function_panier.php');
	$products= '';

	$total=montantglobal();
	$_SESSION['p']=$total;
	$name=$_POST['cli'];

	$_SESSION['cli']=$name;
	
	$ps=$pdo->prepare("INSERT INTO com_proforma(client,username,pt)VALUES(?,?,?)");
    //Pour bien recupere les données on crée un table de parametre
    $params=array($name,$_SESSION['username'],$total);
    //Execution de la requête par leur paramètre en ordre 
    $ps->execute($params);
    $lastid=$pdo->lastInsertId();
    // Pour recuperer l'id du user

    for ($i=0; $i < count($_SESSION['panier']['libelleproduit']); $i++) { 
		$product=$_SESSION['panier']['libelleproduit'][$i];
		$quantity=$_SESSION['panier']['qteproduit'][$i];
		$prix=$_SESSION['panier']['prixproduit'][$i];
		 // ***********recherche***********************

		 $ps=$pdo->prepare("INSERT INTO detail_proforma(code,plat,qte_com,prix)VALUES(?,?,?,?)");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($lastid,$product,$quantity,$prix);
		 //Execution de la requête par leur paramètre en ordre 
		 $ps->execute($params);

	 }
	 $_SESSION['dk']=$lastid;

    ?>
    <script type="text/javascript">
        alert('Votre operation a été effectué avec succès')
        window.open('../view/proforma.php','_self')
    </script>
    <?php
    }