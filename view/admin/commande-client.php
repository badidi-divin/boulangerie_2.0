<?php 
    session_start();
    require_once('securite.php');
    require_once('../../controller/commande-client.php');
    $nav="commande-client";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('header.php'); ?>
    <link rel="stylesheet" href="../../Vendor/auto-completion/style-n.css">
    <link rel="stylesheet" href="../../Vendor/auto-completion/jquery-ui.css">
    <link rel="stylesheet" href="../../Vendor/auto-completion/jquery-ui.min.css">
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <h3>Social Pharma</h3>
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
                <h3>Social Pharma</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <?php require_once('menu-2.php'); ?>
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
                               <input type="text" class="au-input au-input--xl" placeholder="Entrer le Nom du client à chercher..." name="mot1" value="<?php echo ($mot1) ?>" id="cli_name"/>
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
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
                                <h3>ETAPE 1: Choix du(de la) client(e)</h3><br> 
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOM_COMPLET</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['nom_complet'])?></td>
                
                                            
                                            <td>
                                                <a href="./commande.php?id=<?= $et['id']."-".$et['nom_complet']; ?>" class="btn btn-success">Choisir</a>
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
                                    <p>Copyright © 2024. All rights reserved. by <a href="#">Social Pharma</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php require_once('footer.php'); ?>
   <script src="../../Vendor/auto-completion/jquery.min.js"></script>
    <script src="../../Vendor/auto-completion/jquery-3.2.1.min.js"></script>
    <script src="../../Vendor/auto-completion/jquery-ui.min.js"></script>
    <script src="../../Vendor/auto-completion/script.js"></script>
</body>
</html>
<!-- end document-->
