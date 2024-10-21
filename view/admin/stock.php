<?php 
    session_start();
    require_once('../../controller/produit.php');
    require_once '../../controller/parametre-select2.php';
    require_once('securite.php');
    $nav="stock";
    if (isset($_GET['export4'])==1) {
        header('location:stock_export.php');
    }
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
                    <h4>
                    BOULANGERIE 1.0
                </h4>
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
                    <?php require_once('menu-1.php'); ?>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
            <h4>
                    BOULANGERIE 1.O
                </h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                 <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                        <?php if ($_SESSION['role']=='admin-1' || $_SESSION['role']=='admin-2') {
                        ?>
                         <li>
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
                            <a  class="nav-item" href="carte.php">
                                Gérer les Cartes</a>
                        </li>
                        <li>
                            <a  class="nav-item" href="paiement_carte.php">
                                Paiement Carte</a>
                        </li>
                       
                        <li class="active">
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
                            <form class="form-header" action="" method="GET">
                               <input type="text" class="au-input au-input--xl" placeholder="Entrer le designation du produit à chercher..." name="mot1" value="<?php echo ($mot1) ?>"/>
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-success" title="Exporter vers Excel" name="export4">Excel</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="imprime_stock.php" class="btn btn-primary"><i class="zmdi zmdi-print"></i></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <h5>Bienvenue <?php echo $_SESSION['username']; ?></h5>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['username']; ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="edition-compte.php">
                                                        <i class="zmdi zmdi-account"></i>Editer</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Se Déconnecter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>DESIGNATION</th>
                                                <th>QTE STOCK</th> 
                                                <th>PU</th>
                                                <th>DATE</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['code'])?></td>
                                                <td><?php  echo($et['designation'])?></td>
                                                <td>
                                                    <?php  
                                                        if ($et['qte_stock']==0) {
                                                            ?>
                                                            <p style="color:red">Stock épuisé</p>
                                                            <?php
                                                        }else if ($et['qte_stock']>=0 && $et['qte_stock']<=10) {
                                                            ?><p style="color:red"><?php echo($et['qte_stock'])?></p>
                                                            <?php
                                                        }else{
                                                            echo($et['qte_stock']);
                                                        }
                                                        

                                                    ?>
                                                        
                                                    </td>
                                            <td><?php  echo($et['pu']." ".$userinfo['monaie'])?></td>
                                            <td><?php  echo($et['date_enreg'])?></td>
                                            <td>
                                                <?php if ($_SESSION['role']<>'Vendeur') {
                                                    ?>
                                                    <a onclick="return confirm('Etes-Vous sûr?')" href="../../controller/produit-stock.php?id=<?= $et['code'] ?>" class="btn btn-danger">Supprimer</a>
                                                <?php
                                                } ?>
                                            </td>
                                         
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2024. All rights reserved. by <a href="#">Jonathan LEMA</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   <?php require_once('footer.php'); ?>

</body>

</html>
<!-- end document-->
