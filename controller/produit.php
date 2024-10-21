<?php

// ******Supprimer plat**********************************************
    if(isset($_GET['id'])){

    $id=$_GET['id'];
    
    require_once('../model/connexion.php');

    $ps=$pdo->prepare("DELETE FROM plat WHERE id=?");

    $params=array($id);

    $ps->execute($params);
    
    header("location:".$_SERVER['HTTP_REFERER']);
    
    }
// ******End Supprimer plat******************************************

// ********************Affichage des plats**************************

    require_once('../../model/connexion.php');

    if (isset($_GET['mot1']) && $_GET['mot2']==""){
        $mot1=$_GET['mot1'];
        $requete="SELECT * FROM plat WHERE designation='$mot1'";           
    }else if(isset($_GET['mot2']) && $_GET['mot1']==""){
        $mot2=$_GET['mot2'];
        $requete="SELECT * FROM plat WHERE type='$mot2'";    
    }else{
        $requete="SELECT * FROM plat"; 
    }
    $resultat=$pdo->query($requete);

// ********************End Affichage des plats************************

// ********************Affichage des plats**************************

    require_once('../../model/connexion.php');

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
    
    if (isset($_GET['search'])) {

        $requete="SELECT * FROM stock WHERE designation LIKE '%$mot1%'";           
    }else{
        $requete="SELECT * FROM stock";    
    }
    $resultat=$pdo->query($requete);

// ********************End Affichage des plats************************

// *************Insert plat*******************************************
    $errors=array();
    $success=array();

if (isset($_POST['envoie2'])) {
        $type=htmlspecialchars($_POST['type']);
        $designation=htmlspecialchars($_POST['designation']);
        $qte_stock=htmlspecialchars($_POST['qte_stock']);
        $pa=htmlspecialchars($_POST['pa']);
        $pv=htmlspecialchars($_POST['pv']);
        $date_exp=htmlspecialchars($_POST['date_exp']);
        $date_entree=htmlspecialchars($_POST['date_entree']);
        $provenance=htmlspecialchars($_POST['provenance']);
        $depositaire=htmlspecialchars($_POST['depositaire']);

        // Vérification si l'utilisateur existe vraiment
        $requiser=$pdo->prepare("SELECT * FROM stock WHERE designation=?");
        $requiser->execute(array($designation));
        // rowCount permet de compter le nombre saisie par le user
        $userexist=$requiser->rowCount();
        if ($userexist==1) {
            $userinfo=$requiser->fetch();
            $new=$qte_stock+$userinfo['qte_stock'];
            $ps=$pdo->prepare("UPDATE stock SET qte_stock =? WHERE designation=?");
            //Pour bien recupere les données on crée un table de parametre
            $params=array($new,$designation);
            //Execution de la requête par leur paramètre en ordre 
            $ps->execute($params);
            // Pour recuperer l'id du user
            $success['cool']="Enregistrement effectuée avec succès!";
    
        }else{

             $ps=$pdo->prepare("INSERT INTO plat(type,designation,qte_stock,pa,pv,date_exp,date_entree,provenance,depositaire,user)VALUES(?,?,?,?,?,?,?,?,?,?)");
            //Pour bien recupere les données on crée un table de parametre
            $params=array($type,$designation,$qte_stock,$pa,$pv,$date_exp,$date_entree,$provenance,$depositaire,$_SESSION['username']);
            //Execution de la requête par leur paramètre en ordre 
            $ps->execute($params);
            // Pour recuperer l'id du user
            // Stockage*************************
            // ***************Stockage*************************
            $ps=$pdo->prepare("INSERT INTO stock SET designation=?,qte_stock=?,pu=?,pa=?");
            //Pour bien recupere les données on crée un table de parametre
            $params=array($designation,$qte_stock,$pv,$pa);
            //Execution de la requête par leur paramètre en ordre 
            $ps->execute($params);
            // Pour recuperer l'id du user
            $success['cool']="Enregistrement effectuée avec succès!";
        } 
    }                  
// *************End Insert produit***********************************

// *************Edition produit*******************************************

if (isset($_GET['dk'])) {
    $requser=$pdo->prepare("SELECT * FROM plat WHERE id=?");
    $requser->execute(array($_GET['dk']));
    $userinfo=$requser->fetch();

    if (isset($_POST['envoie3'])) {

          $designation=htmlspecialchars($_POST['designation']);
        $qte_stock=htmlspecialchars($_POST['qte_stock']);
        $pa=htmlspecialchars($_POST['pa']);
        $pv=htmlspecialchars($_POST['pv']);
        $date_exp=htmlspecialchars($_POST['date_exp']);
        $date_entree=htmlspecialchars($_POST['date_entree']);
        $provenance=htmlspecialchars($_POST['provenance']);
        $depositaire=htmlspecialchars($_POST['depositaire']);

        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE plat SET designation=?,qte_stock=?,pa=?,pv=?,date_exp=?,date_entree=?,provenance=?,depositaire=? WHERE id=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($designation,$qte_stock,$pa,$pv,$date_exp,$date_entree,$provenance,$depositaire,$_GET['dk']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        $success['cool']="Edition effectuée avec succès!";
     
        }
        }
// *************End Edition produit***********************************

//*************************Imprimer**********************************       
    $requeteprint="SELECT * FROM stock";   
    $resultatprint=$pdo->query($requeteprint);

// ************************End **************************************
