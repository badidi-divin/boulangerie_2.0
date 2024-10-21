<?php 
    session_start();
    require_once('../../controller/paiement_carte.php');
    require_once '../../controller/parametre-select2.php';
    $c=1;
    require_once('securite.php');
    $nav="commande2";
    if (isset($_GET['export002'])==1) {
        header('location:paiement_export.php');
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
                    BOULANGERIE 1.0
                </h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                        <li>
                            <a  class="nav-item" href="rapport.php">
                                Tableau de bord</a>
                        </li>

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
                        <li class="has-sub">
                            <a  class="nav-item" href="client.php">
                                Client</a>
                        </li>
                        <li class="has-sub">
                            <a  class="nav-item" href="carte.php">
                                Gérer Carte</a>
                        </li>
                        <li class="active">
                            <a  class="nav-item" href="paiement_carte.php">
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
                         <li>
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
                               <input type="text" class="au-input au-input--xl" placeholder="Entrer le numéro carte..." name="mot1" value="<?php echo ($mot1) ?>"/>
                               <input type="date" class="au-input"  name="mot2" value="<?php echo ($mot2) ?>"/>
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-success" title="Exporter vers Excel" name="export002"><i class="zmdi zmdi-ms-excel"></i>Excel</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;

                            </form>
                            <a  href="ajout_paiement.php" class="btn btn-primary"><i class="zmdi zmdi-plus"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" data-toggle="modal" data-target="#completeModal" class="btn btn-success" title="imprimer la liste"><i class="zmdi zmdi-print">Client+Date+Date</i></a>
                            <div class="header-button">
                               
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
                                                <th>NUM_CARTE</th>
                                                <th>CLIENT</th>
                                                <th>MONTANT</th>
                                                <th>NBRE_DE_PAIN</th>
                                                <th>MONTANT_PAYER</th>
                                                <th>B.P</th>
                                                <th>NET</th>
                                                <th>DATES</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id_op'])?></td>
                                                <td><?php  echo($et['num_carte'])?></td>
                                                <td><?php  echo($et['client'])?></td>
                                                <td><?php  echo($et['montant'])?>FC</td>
                                                <td><?php  echo($et['nbre_pain'])?></td>
                                                <td><?php  echo($et['montant2'])?>FC</td>
                                                <td><?php  echo($et['bp'])?>FC</td>
                                                <td><?php  echo($et['net'])?>FC</td>
                                                <td><?php  echo($et['date'])?></td>
                                            <td>
                                                <a onclick="return confirm('Etes-Vous sûr?')" href="../../controller/paiement.php?id=<?= $et['id_op'] ?>" class="btn btn-danger" title="Annulation de la commande">Annuler</a></td>
                                             </tr>
                                               <?php
                                               
                                            }
                                                ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="font-size:20px"></th>
                                                <th> </th>
                                                <th> </th>

                                                <th >Total:<?php
                                                    $nblmd=$pdo->prepare("SELECT SUM(montant) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>FC</th>
                                           <th>Total:<?php  $nblmd=$pdo->prepare("SELECT SUM(nbre_pain) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?></th>
                                            <th>Total:<?php  $nblmd=$pdo->prepare("SELECT SUM(montant2) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>Fc</th>
                                            <th>Total:<?php  $nblmd=$pdo->prepare("SELECT SUM(bp) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>Fc</th>
                                            <th>Total:<?php  $nblmd=$pdo->prepare("SELECT SUM(net) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$mot1%' AND date LIKE '%$mot2%'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>Fc</th>
                                            <th> </th>
                                            </tr>
                                        </tfoot>
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
                <form method="get" action="imprimer_carteuser.php">
                <div class="form-group">
                        <label>Numéro carte:</label>
                       <select name="nom" id="" class="form-control"> 
                           <option value="">
                           Tous
                       </option>   
                       <?php 
                    $requete="SELECT * FROM carte";    
                    $resultat=$pdo->query($requete);
                       while ($et=$resultat->fetch()){?>
                       
                           <option value="<?php  echo($et['num_carte'])?>">
                                <?php  echo($et['num_carte']."-".$et['client']."-".$et['montant'])?>Fc  
                           </option>
                        <?php
                            }
                        ?>
                       </select>
                      </div>
                    <div class="form-group">
                        <label>Date1:</label>
                       <input type="date" name="de" id="" class="form-control">
                      </div>
                     <div class="form-group">
                        <label>Date2:</label>
                       <input type="date" name="a" id="" class="form-control">
                      </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="envoie9">Imprimer</button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="completeModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Critère d'Impression</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="get" action="imprimer_comgen2.php">
                <div class="form-group">
                    <label>De:</label>
                   <input type="date" name="de" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>A:</label>
                   <input type="date" name="a" id="" class="form-control">
                  </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="envoie9">Imprimer</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          </div>
            </form>
        </div>
      </div>
    </div>
    </div>
   <?php require_once('footer.php'); ?>

</body>

</html>
<!-- end document-->
