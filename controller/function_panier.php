<?php
function creationPanier(){
	try{
	$db=new PDO('mysql:host=localhost;dbname=social_pharma','root','');
	//$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);//les noms des champs seront en caractère majuscile.
	//$db->setAttribute(PDO::ERRMODE,PDO::ERRMODE_EXCEPTION);//les erreurs lanceront les exceptions
	}
	catch(Exception $e){
	echo "Une Erreur est survenues";
	die();
	}
	if(!isset($_SESSION['panier'])){
$_SESSION['panier']=array();
$_SESSION ['panier']['libelleproduit']=array();
$_SESSION ['panier']['qteproduit']=array();
$_SESSION ['panier']['prixproduit']=array();
$_SESSION ['panier']['verrou']=false;



	}
	return true;
}
// panier d'achat
function ajouterArticle($libelleproduit,$qteproduit,$prixproduit){

	if(creationPanier() && !isVerouille()){

   $position_produit=array_search($libelleproduit,$_SESSION['panier']['libelleproduit']);
   if($position_produit!==false){
    $_SESSION['panier']['qteproduit'][$position_produit] +=$qteproduit;

   }else{
   
   array_push($_SESSION['panier']['libelleproduit'],$libelleproduit);
   array_push($_SESSION['panier']['qteproduit'],$qteproduit);
   array_push($_SESSION['panier']['prixproduit'],$prixproduit);

   }
	}else{

   	echo 'Veuillez contactez l\'administrateur';
   }

}
function Modifierqteproduit($libelleproduit,$qteproduit){

if(creationPanier() && !isVerouille()){
	if($qteproduit>0){
$position_produit=array_search($libelleproduit,$_SESSION['panier']['libelleproduit']);
		if($position_produit!==false){

			$_SESSION['panier']['qteproduit'][$position_produit]=$qteproduit;
		}
	}else{
	supprimerArticle($libelleproduit);
}
}
else{
		echo 'Veuillez contactez l\'administrateur';
}
}
function supprimerArticle($libelleproduit){
	if(creationPanier() && !isVerouille()){

     $tmp=array();
     $tmp['libelleproduit']=array();
     $tmp['qteproduit']=array();
     $tmp['prixproduit']=array();
     $tmp['verrou']=$_SESSION['panier']['verrou'];
     //$tmp['tva']=$_SESSION['panier']['tva'];


     for($i = 0;$i < count($_SESSION['panier']['libelleproduit']); $i++){

 if($_SESSION['panier']['libelleproduit'][$i]!==$libelleproduit){
array_push($tmp['libelleproduit'],$_SESSION['panier']['libelleproduit'][$i]);
array_push($tmp['qteproduit'],$_SESSION['panier']['qteproduit'][$i]);
array_push($tmp['prixproduit'],$_SESSION['panier']['prixproduit'][$i]);
     	}
     }
     $_SESSION['panier']=$tmp;
     unset($tmp);

	}
	else{
		echo 'Veuillez contactez l\'administrateur';
	}

}
function montantglobal(){

$total=0;

for($i=0;$i<count($_SESSION['panier']['libelleproduit']); $i++){
	$total+=$_SESSION['panier']['qteproduit'][$i]*$_SESSION['panier']['prixproduit'][$i];
}
return $total;

}

function supprimerpanier(){
    unset($_SESSION['panier']);
} 
function isVerouille(){

	if(isset($_SESSION['panier']) && isset($_SESSION['isVerouille'])){

		return true;

	}else{

		return false;
	}

}
function compterarticle(){
   if(isset($_SESSION['panier'])){

   return count($_SESSION['panier']['libelleproduit']);	
   }else{

   	return 0;
   }
}
