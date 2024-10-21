<?php 
    session_start();
    require_once('securite.php');
    $c=1;
    require_once('../../controller/select-com.php');

    if (isset($_GET['id'])) {

       $_SESSION['cli_id']=$_GET['id'];
    }
    if (isset($_POST['envoie10'])) {
        $red=$_POST['red']/100;
        $_SESSION['red']=$red;
        $af_red=array();
        $af_red['success']="Reduction accordé!";
    }
    $nav="commande";
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('header.php'); ?>
    <link rel="stylesheet" href="../../Vendor/auto-completion-2/style-n.css">
    <link rel="stylesheet" href="../../Vendor/auto-completion-2/jquery-ui.css">
    <link rel="stylesheet" href="../../Vendor/auto-completion-2/jquery-ui.min.css">
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
                               <input type="text" class="au-input au-input--xl" placeholder="Entrer le designation du produit à chercher..." name="mot1" value="<?php echo ($mot1) ?>" id="pro_name"/>
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <a href="../pannier.php">Voir le Pannier</a>
                            <a href="#" data-toggle="modal" data-target="#completeModal" class="btn btn-danger">Accorder une Reduction?</a>
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
                                <h3>ETAPE 2: Choix du(des) produit(s) <a href="commande-client.php">Retour à l'etape 1</a><?= " (".$_SESSION['cli_id'].")";?></h3><br>
                                <?php
                                if (!empty($af_red)):
                                ?>
                                <div class="alert alert-success">
                                    <p></p>
                                    <ul>
                                        <?php foreach($af_red as $succes):?>
                                            <li><?= $succes; ?>- Red= <?= $_SESSION['red']; ?></li>
                                        <?php endforeach; ?>
                                        
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <div class="table-responsive table--no-card m-b-30">

                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>DESIGNATION</th>
                                                <th>QTE STOCK</th>
                                                <th>PV</th>
                                                <th>IMAGE</th>
                                                <th>ACTIONS</th>                  
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($c)?></td>
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
                                                <td><?php  echo($et['pv'])?></td>
                                                <td><a href="./img/<?php  echo($et['image'])?>" target="_blank"><img src="./img/<?php  echo($et['image'])?>" width="50px" height="60px"></a></td>
                                            <td><?php if($et['qte_stock']>0){?><a href="../pannier.php?action=ajout&amp;l=<?= $et['designation']; ?>&amp;q=1&amp;p=<?= $et['pv']; ?>" class="btn btn-success">Ajouter Au Panier</a><?php }else{echo "<h3 style='color:red;'>Stock épuisé!</h3>" ;} ?></td>
                                         
                                             </tr>
                                               <?php
                                               $c++;
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
     <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">REDUCTION</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="">
                <div class="form-group">
                    <label>Pourcentage(%):</label>
                   <input type="number" name="red" id="" class="form-control">
                  </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="envoie10">Accorder</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          </div>
            </form>
        </div>
      </div>
    </div>

   <?php require_once('footer.php'); ?>
   <script src="../../Vendor/auto-completion-2/jquery.min.js"></script>
   <script src="../../Vendor/auto-completion-2/jquery-3.2.1.min.js"></script>
   <script src="../../Vendor/auto-completion-2/jquery-ui.min.js"></script>
   <script src="../../Vendor/auto-completion-2/script.js"></script>

</body>

</html>
<!-- end document-->
