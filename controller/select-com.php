<?php 
// ***************Etape 1 selection du produit ************
	require_once('../../model/connexion.php');

    $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
    
    if (isset($_GET['search'])) {

        $requete="SELECT * FROM plat WHERE designation LIKE '%$mot1%'";           
    }else{
        $requete="SELECT * FROM plat";    
    }
    $resultat=$pdo->query($requete);

    // ********************Fin**********************************