<?php
   require_once('../../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
   $mot2=isset($_GET['mot2'])?$_GET['mot2']:"";

    if (isset($_GET['search'])) {

        $requete="SELECT * FROM paiement_carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%' ORDER BY date DESC";           
    }else{
        $requete="SELECT * FROM paiement_carte ORDER BY date DESC";    
    }
    $resultat=$pdo->query($requete);