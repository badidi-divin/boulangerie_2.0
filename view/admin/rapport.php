<?php  
    session_start();
    if($_SESSION['role']=='Vendeur'){
        header("location:client.php");
    }
    require_once('securite.php');
    require_once('../../controller/cookie-config.php');
    require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';
    $nav="rapport";
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <?php require_once('header.php'); ?>
</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            BOULANGERIE 1.0
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                 <?php
                        if ($_SESSION['role']=="admin-1" || $_SESSION['role']=="admin-2") {
                            ?>
                             <li class="has-sub">
                            <a class="js-arrow" href="rapport.php">
                                Tableau de bord</a>
                        </li>
                            <?php
                        }
                       
                    ?>
                         <li class="has-sub">
                            <a class="js-arrow" href="fournisseur.php">
                                </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="client.php">
                                Client</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="carte.php">
                                Carte</a>
                        </li>
                     <?php
                        if ($_SESSION['role']=="admin-1" || $_SESSION['role']=="admin-2") {
                            ?> 

                        <li>
                            <a href="produit.php">
                              Approvisionnement</a>
                        </li>
                        <li>
                            <a href="expiration_produit.php">
                              Suivre les dates d'expiration</a>
                        </li>
                     <?php
                        }
                       
                    ?>
                      <?php
                        if ($_SESSION['role']=="admin-1" || $_SESSION['role']=="admin-2") {
                            ?> 

                        <li>
                            <a href="stock.php">
                              Stock</a>
                        </li>
                     <?php
                        }
                       
                    ?>
                        <li>
                            <a href="../pannier.php">
                                Vente</a>
                        </li>
                     <?php
                        if ($_SESSION['role']=="admin-1" || $_SESSION['role']=="admin-2") {
                            ?>
                         <li>
                            <a href="commande2.php" title="Rapport des commandes">
                               Rapport de vente</a>
                        </li>
                         <li>
                            <a href="commande2.php" title="Rapport des commandes">
                               Proforma</a>
                        </li>
                        <li>
                            <a href="utilisateur.php">
                                Utilisateur</a>
                        </li>
                        <li>
                            <a href="parametres.php">
                                Paramètre</a>
                        </li>
                           <?php
                        }
                       
                    ?>
                     <li>
                           <a href="ai.pdf">
                                Besoin d'aide?</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <h4>
                    BOULANGERIE 1.0
                </h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                 <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                        <?php if ($_SESSION['role']=='admin-1' || $_SESSION['role']=='admin-2') {
                        ?>
                         <li class="active">
                            <a   class="nav-item" href="rapport.php">
                                Tableau de bord</a>
                        </li>

                    <?php
                    } ?>
                        <li>
                            <a   class="nav-item" href="fournisseur.php">
                                Fournisseurs</a>
                        </li>
                        <li>
                            <a  class="nav-item" href="facture.php">
                                Facture Fournisseur</a>
                        </li>
                        <li>
                            <a  class="nav-item" href="produit.php">
                               Approvisionnement</a>
                        </li>
                        <li>
                            <a href="expiration_produit.php">
                              Suivre les dates d'expiration</a>
                        </li>

                        <li>
                            <a  class="nav-item" href="client.php">
                                Client</a>
                        </li>
                        <li>
                            <a class="nav-item" href="carte.php">
                                Gérer les Cartes</a>
                        </li>
                         <li>
                            <a class="nav-item" href="paiement_carte.php">
                                Paiement Carte</a>
                        </li>
                        <li class="has-sub">
                            <a  href="stock.php"  class="nav-item">
                              Stock</a>
                        </li>
                        <li class="has-sub">
                            <a  href="../pannier.php" class="nav-item">
                                Vente</a>
                        </li>


                         <?php
                        if ($_SESSION['role']=="admin-1" || $_SESSION['role']=="admin-2") {
                            ?>
                     
                         <li class="has-sub">
                            <a  href="commande2.php" title="Rapport des commandes" class="nav-item">
                               Rapport de vente</a>
                        </li>
                        <li class="has-sub">
                            <a  href="proformas.php" title="Rapport des commandes"  class="nav-item">
                               Proformas</a>
                        </li>
                        
                        <li class="has-sub">
                            <a  href="utilisateur.php" class="nav-item">
                                Utilisateur</a>
                        </li>
                        <li class="has-sub">
                            <a href="parametres.php"  class="nav-item">
                                Paramètre</a>
                        </li>
                           <?php
                        }
                       
                    ?>
                     <li class="has-sub">
                           <a href="ai.pdf" class="nav-item">
                                Besoin d'aide?</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" method="get" action="">
                                
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <?php
                        $requser=$pdo->prepare("SELECT * FROM stock WHERE qte_stock=0");
                        $requser->execute();
                        $userexist=$requser->rowCount();
                        if ($userexist) {
                           ?>
                           <div class="alert alert-danger">
                            <p>Attention!!!!!!!, vous avez des <a href="imprimer-produit-3.php">produits</a>  en rupture de stock; veillez approvisionner svp!</p>
                            </div>
                           <?php
                        }
                            ?>
                         <?php
                        $requser=$pdo->prepare("SELECT * FROM stock WHERE qte_stock>0 AND qte_stock<10");
                        $requser->execute();
                        $userexist=$requser->rowCount();
                        if ($userexist) {
                           ?>
                           <div class="alert alert-warning">
                            <p>Attention!!!!!!!, vous avez des <a href="imprimer-produit-4.php">produits</a>  en stock critique; veillez approvisionner svp!</p>
                            </div>
                           <?php
                        }
                            ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">INFORMATION SUR LES CLIENTS </h2>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                           <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h3 style="color:white;">CLIENT</h3>
                                                <h2 align="center">
                                                    <?php
                                    $nblmd=$pdo->prepare('SELECT * FROM client WHERE nom_complet<>"inconnue"');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?><br><a href="imprimer-clients.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                                        
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">INFORMATION SUR LES PRODUITS</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h3 style="color:white;">EN STOCK</h3>
                                                <h2 align="center">
                                                    <?php
                                    $nblmd=$pdo->prepare('SELECT * FROM stock WHERE qte_stock>0');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?><br><a href="imprimer-produit-1.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h4 style="color:white;">STOCK NORMAL</h4>
                                                <h2 align="center">
                                                    <?php
                                    $nblmd=$pdo->prepare('SELECT * FROM stock WHERE qte_stock>=10');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?><br><a href="imprimer-produit-2.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h3 style="color:white;">STOCK EPUISE</h3>
                                                <h2 align="center">
                                                    <?php
                                    $nblmd=$pdo->prepare('SELECT * FROM stock WHERE qte_stock=0');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?><br><a href="imprimer-produit-3.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h4 style="color:white;">STOCK CRITIQUE</h4>
                                                <h2 align="center">
                                                    <?php
                                    $nblmd=$pdo->prepare('SELECT * FROM stock WHERE qte_stock>0 AND qte_stock<10');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?><br><a href="imprimer-produit-4.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">INFORMATION SUR LA COMMANDE</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h4 style="color:white;">NBRE COMMANDE</h4>
                                                <h2 align="center">
                                                    <?php
                                    $nblmd=$pdo->prepare('SELECT * FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?><br><a href="commande2.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Consulter</a></h2>
                                                
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h4 style="color:white;">TOTAL VENTE:</h4>
                                                <h2 align="center">
                                                    <?php
                                  $nblmd=$pdo->prepare("SELECT SUM(pt) AS prix_total FROM commande");
                                  $nblmd->execute();
                                  $nblmd=$nblmd->fetch()['prix_total'];
                                  echo $nblmd;
                                ?><?php  echo($userinfo['monaie'])?><br>
                                <?php
                                    echo  round($nblmd/$userinfo['taux'],2);
                                ?>$<br>
                                <a href="commande2.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Consulter</a></h2>
                                                
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            <div class="text">
                                                <h4 style="color:white;">BENEFICE</h4>
                                                <h2 align="center">
                                                    <?php
                                  $nblmd=$pdo->prepare("SELECT SUM(benef) AS prix_total FROM detail_commande");
                                  $nblmd->execute();
                                  $nblmd=$nblmd->fetch()['prix_total'];
                                  echo $nblmd;
                                ?><?php  echo($userinfo['monaie'])?><br>
                                <?php
                                    echo  round($nblmd/$userinfo['taux'],1);
                                ?>$
                                <a href="#" data-toggle="modal" data-target="#completeModal" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                        </div>
                        <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            <div class="text">
                                                <h4 style="color:white;">REMISE</h4>
                                                <h2 align="center">
                                                    <?php
                                  $nblmd=$pdo->prepare("SELECT SUM(red) AS prix_total FROM commande");
                                  $nblmd->execute();
                                  $nblmd=$nblmd->fetch()['prix_total'];
                                  echo $nblmd;
                                ?><?php  echo($userinfo['monaie'])?><br>
                                <?php
                                    echo  round($nblmd/$userinfo['taux'],2);
                                ?>$

                                </h2>
                                <a href="commande2.php" class="btn btn-primary">consulter les details</a>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
     <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Critère d'Impression</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="get" action="imprimer_benef.php">
                <div class="form-group">
                    <label>Date 1:</label>
                   <input type="date" name="date1" id="" class="form-control">
                  </div>
                <div class="form-group">
                    <label>Date 2:</label>
                   <input type="date" name="date2" id="" class="form-control">
                  </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="envoie9">Imprimer</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          </div>
            </form>
        </div>
      </div>
    </div>

   <?php require_once('footer.php'); ?>
</body>

</html>
<!-- end document-->
