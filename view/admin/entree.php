<?php 
    session_start();
    require_once('../../controller/entree.php');
    require_once('securite.php');
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
                        <h3>Gestan</h3>
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
                <h3>Gestan 1.0</h3>
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
                               <input type="text" class="au-input au-input--xl" placeholder="Entrer le Nom du client à chercher..." name="mot1" value="<?php echo ($mot1) ?>"/>
                               <input type="date" class="au-input"  name="mot2" value="<?php echo ($mot2) ?>"/>
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <a href="ajout-cli.php" class="btn btn-primary"><i class="zmdi zmdi-plus"></i></a>
                            <a href="#" data-toggle="modal" data-target="#completeModal" class="btn btn-success" title="imprimer la liste"><i class="zmdi zmdi-print"></i></a>
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
                                                <th>NOM_COMPLET</th>
                                                <th>SEXE</th>
                                                <th>TELEPHONE</th>
                                                <th>EMAIL</th>
                                                <th>ADRESSE</th>
                                                <th>DATE</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['nom_complet'])?></td>
                                                <td><?php  echo($et['sexe'])?></td>
                                                <td>+<?php  echo($et['telephone'])?></td>
                                                <td><?php  echo($et['email'])?></td>
                                                <td><?php  echo($et['adresse'])?></td>
                                                <td><?php  echo($et['date'])?></td>
                                            
                                            <td>
                                                <a href="./edit-client.php?dk=<?= $et['id'] ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Etes-Vous sûr?')" href="../../controller/client.php?id=<?= $et['id'] ?>" class="btn btn-danger">Delete</a></td>
                                             
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
                                    <p>Copyright © 2024. All rights reserved. by <a href="#">Divin BADIDI KAZIMALI</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <form method="get" action="imprimer_cli.php">
                <div class="form-group">
                    <label>Choisissez la date:</label>
                   <input type="date" name="dates" id="" class="form-control">
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
