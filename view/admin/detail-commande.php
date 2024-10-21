<?php
    session_start();
    require_once('../../model/connexion.php');
    require_once('../../controller/select-detail-com.php');
    require_once '../../controller/parametre-select2.php';
    $c=1;
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Impression</title>
    <link rel="stylesheet" href="css/test.css">
    <style type="text/css">
        @page
        {
            size:A4;
            margin:0; 

        }
        #print-btn{
            display: none;
            visibility: none;
        }
        .margetop{
            margin-top: 60px;
        }
        .spacer{
            margin-top: 10px;
        }
        .space{
            margin-top: 70px;
        }
        .spac{
            margin-top: 80px;
        }
        .a{
            text-align:center;
            text-decoration: blink;
        }
    </style>
</head>
<body>
    <!--************************ Header ***********************************-->
    <!-- Navigation -->

    <div class="container col-12" >
        <a href="commande2.php">Retour>>>></a>
                <div class="row mb-4" align="left">
                    <div class="col-sm-6">                     
                    <img src="./img/<?= $userinfo['img']; ?>" width="100px" height="70px">                 
                    <h3 class="text-dark mb-1"><?= $userinfo['nom'] ?></h3>
                                         
                    <div><?= $userinfo['adresse'] ?></div>
                                            <div>Email: <?= $userinfo['email'] ?></div>
                                            <div>Phone: <?= $userinfo['telephone'] ?></div>
                                            <div>Date Aujourd'hui: <?= date('d/m/y:h-m-s') ?></div>
                                        </div>
                    <div align="right">
                </div>
                                       
                                    
                </div>
                <div class="panel panel-default">
                    <!-- Le corps du tableau où l'on mettra le contenu -->
                   <div class="panel-heading">
                        DETAILS COMMANDES<a onclick="window.print();">ici</a>
                    </div>
                    <div class="panel-body">
                                      <table class="table table-borderless table-striped table-earning">
                                      <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CODE_COMMANDE</th>
                                                <th>PRODUITS</th>
                                                <th>QTE_COM</th>
                                                <th>PV</th>
                                                <th>PA</th>
                                                <th>BEN</th>
                                                <th>DATES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($c)?></td>
                                                <td><?php  echo($et['code_commande'])?></td>
                                                <td><?php  echo($et['plat'])?></td>
                                                <td><?php  echo($et['qte_com'])?></td>
                                                <td><?php  echo($et['prix']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['pa']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['benef']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['date'])?></td>
                                            
                                             </tr>
                                               <?php
                                               $c++;
                                            }
                                                ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total:</th>
                                                <th></th>
                                                <th></th>
                                                <th><?php $id2=$_GET['id'];
                                                    $nblmd=$pdo->prepare("SELECT SUM(qte_com) AS prix_total FROM detail_commande WHERE code_commande='$id2'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?></th>
                                                <th><?php $id2=$_GET['id'];
                                                    $nblmd=$pdo->prepare("SELECT SUM(prix) AS prix_total FROM detail_commande WHERE code_commande='$id2'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?><?= $userinfo['monaie'];?></th>
                                                <th><?php
                                                    $id2=$_GET['id'];
                                                    $nblmd=$pdo->prepare("SELECT SUM(pa) AS prix_total FROM detail_commande WHERE code_commande='$id2'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?><?= $userinfo['monaie'];?></th>
                                                <th><?php
                                                    $id2=$_GET['id'];
                                                    $nblmd=$pdo->prepare("SELECT SUM(benef) AS prix_total FROM detail_commande WHERE code_commande='$id2'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?><?= $userinfo['monaie'];?>
                                            </th>
                                            </tr>
                                        </tfoot>
                                    
                                    </table>
                    </div>
</div>
    <!-- Circulation de la page -->
    
    
    <!-- Affichage inscris end -->
        
    




<!-- ***********footer Ends******************** -->
<!-- **********************Code Javascript*********************-->
<!-- **********************Code Javascript*********************-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
        $(document).ready(function(){
            window.print();
        });
    
    </script>
</body>
</html>