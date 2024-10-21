<?php
   require_once('../../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
   $mot2=isset($_GET['mot2'])?$_GET['mot2']:"";

    if (isset($_GET['search'])) {

        $requete="SELECT * FROM com_proforma WHERE id LIKE '%$mot1%' AND date LIKE '%$mot2%'";           
    }else{
        $requete="SELECT * FROM com_proforma";    
    }
    $resultat=$pdo->query($requete);