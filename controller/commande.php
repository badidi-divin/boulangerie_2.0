<?php 
	
    // *****************Ajout commande *****************************
	if(isset($_POST['envoie'])){
	// require_once('../model/connexion.php');
	// require_once('function_panier.php');
	$products= '';

	$total=montantglobal();

	$name=$_POST['cli'];
	$red=$_POST['red'];
	$reglement=$_POST['reglement'];
	$_SESSION['reglement']=$reglement;
	$_SESSION['remise']=$red;
	$net=$total-$red;
	$_SESSION['net']=$net;
	$_SESSION['cli']=$name;
	
	$ps=$pdo->prepare("INSERT INTO commande(client,reglement,username,pt,red,net)VALUES(?,?,?,?,?,?)");
    //Pour bien recupere les données on crée un table de parametre
    $params=array($name,$reglement,$_SESSION['username'],$total,$red,$net);
    //Execution de la requête par leur paramètre en ordre 
    $ps->execute($params);
    $lastid=$pdo->lastInsertId();
    // Pour recuperer l'id du user

    for ($i=0; $i < count($_SESSION['panier']['libelleproduit']); $i++) { 
		$product=$_SESSION['panier']['libelleproduit'][$i];
		$quantity=$_SESSION['panier']['qteproduit'][$i];
		$prix=$_SESSION['panier']['prixproduit'][$i];
		 // ***********recherche***********************
		 $requser2=$pdo->prepare("SELECT * FROM stock WHERE designation=?");
		 $requser2->execute(array($product));
		 $userinfo2=$requser2->fetch();

		 $n_q=$userinfo2['qte_stock']-$quantity;
		 $pa=$userinfo2['pa'];
		 $ben=($prix-$pa)*$quantity;

		 $ps=$pdo->prepare("INSERT INTO detail_commande(code_commande,plat,qte_com,prix,pa,benef)VALUES(?,?,?,?,?,?)");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($lastid,$product,$quantity,$prix,$pa,$ben);
		 //Execution de la requête par leur paramètre en ordre 
		 $ps->execute($params);

		 // *****modification*******************************************
		 $ps1=$pdo->prepare("UPDATE stock SET qte_stock=? WHERE designation=?");
		//Pour bien recupere les données on crée un table de parametre
		$params2=array($n_q,$product);
		 //Execution de la requête par leur paramètre en ordre 
		 $ps1->execute($params2);

	 }
	 $_SESSION['dk']=$lastid;

    ?>
    <script type="text/javascript">
        alert('Votre commande a été reçu avec succès')
        window.open('../view/facture.php','_self')
    </script>
    <?php
    }