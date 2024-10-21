<?php 
    session_start();
    require_once('../../bdd/connexion.php');
    require_once('../../model/select-detail.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('header.php'); ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <h3>Tableau de Bord</h3>
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
                            if ($_SESSION['role']=="admin") {
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="rapport.php">
                                <i class="fas fa-tachometer-alt"></i>Rapport de Vente</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Client</a>
                        </li>
                        <li>
                            <a href="plat.php">
                                <i class="fas fa-chart-bar"></i>Plat</a>
                        </li>
                         <li>
                            <a href="commande.php">
                                <span style="border-radius:  50%;
                                            position: relative;
                                            top:10px;
                                            left: -10px; 
                                            background-color:red;
                                            color:white">
                                            <?php $nblmd=$pdo->prepare('SELECT * FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd); ?></span> Commande à distance </a>
                        </li>
                        <li>
                            <a href="commande-resto.php">
                                <span style="border-radius:  50%;
                                            position: relative;
                                            top:10px;
                                            left: -10px; 
                                            background-color:red;
                                            color:white">
                                            <?php $nblmd=$pdo->prepare('SELECT * FROM commande_resto');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd); ?></span> Commande sur place </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h3>Tableau de Bord</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                          <?php
                            if ($_SESSION['role']=="admin") {
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="rapport.php">
                                <i class="fas fa-tachometer-alt"></i>Rapport de Vente</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="dashbord.php">
                                <i class="fas fa-tachometer-alt"></i>Client</a>
                        </li>
                        <li>
                            <a href="plat.php">
                                <i class="fas fa-chart-bar"></i>Plat</a>
                        </li>
                         <li>
                            <a href="commande.php">
                                <span style="border-radius:  50%;
                                            position: relative;
                                            top:10px;
                                            left: -10px; 
                                            background-color:red;
                                            color:white">
                                            <?php $nblmd=$pdo->prepare('SELECT * FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd); ?></span> Commande à distance </a>
                        </li>
                        <li>
                            <a href="commande-resto.php">
                                <span style="border-radius:  50%;
                                            position: relative;
                                            top:10px;
                                            left: -10px; 
                                            background-color:red;
                                            color:white">
                                            <?php $nblmd=$pdo->prepare('SELECT * FROM commande_resto');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd); ?></span> Commande sur place </a>
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
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <h5>Bienvenue <?php echo $_SESSION['username']; ?></h5>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username']; ?></a>
                                        </div>
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
                                                <th>N°</th>
                                                <th>ID_COM</th>
                                                <th>PLAT</th>
                                                <th>QTE_COM</th>
                                                <th>PRIX</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['code_commande'])?></td>
                                                <td><?php  echo($et['plat'])?></td>
                                                <td><?php  echo($et['qte_com'])?></td>
                                                <td><?php  echo($et['prix'])?></td>
                                            <td>
                                                <?php if ($_SESSION['role']=="admin") {
                                                    
                                                 ?>
                                                <a onclick="return confirm('Etes-Vous sûr?')" href="../../model/sup-detail.php?id=<?= $et['id'] ?>" class="btn btn-danger">Delete</a>
                                                <?php } ?>
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
                                    <p>Copyright © 2022 TFC. All rights reserved. by <a href="#">Fimbo</a>.</p>
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
