<?php
    session_start();
    require_once '../../controller/select-proforma.php';
    require_once '../../controller/parametre-select2.php';
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
                        LISTE DES PROFORMAS <a onclick="window.print();">ici</a>
                    </div>

                    <div class="panel-body">
                                     <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CLIENT</th>
                                                <th>USERNAME</th>
                                                <th>PT</th>
                                                <th>DATES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['client'])?></td>
                                                <td><?php  echo($et['username'])?></td>
                                                <td><?php  echo($et['pt']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['dates'])?></td>
                                             </tr>
                                               <?php
                                               
                                            }
                                                ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="font-size:20px">Total_PT:<?php
                                                    $nblmd=$pdo->prepare("SELECT SUM(pt) AS prix_total FROM com_proforma WHERE id LIKE '%$mot1%' AND date LIKE '%$mot2%'");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?><?= $userinfo['monaie'];?></th>
                                            <th> </th>
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