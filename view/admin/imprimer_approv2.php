<?php
    session_start();
    require_once '../../controller/select-approv2.php';
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
                        LISTE DES APPROVISIONNEMENTS  <a onclick="window.print();">ici</a>
                    </div>

                    <div class="panel-body">
                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FOURNISSEURS</th>
                                                <th>DESIGNATION</th>
                                                <th>QTE STOCK</th>
                                                <th>PA</th>
                                                <th>PV</th>
                                                <th>DATE_EXPIRATION</th>
                                                <th>DATE_ENTREE</th>
                                                
                                                <th>DEPOSITAIRE</th>
                                                <th>RECEPTIONNISTE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['type'])?></td>
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
                                                <td><?php  echo($et['pa']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['pv']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['date_exp'])?></td>
                                                <td><?php  echo($et['date_entree'])?></td>
                                              
                                                <td><?php  echo($et['depositaire'])?></td>
                                                <td><?php  echo($et['user'])?></td>
                    
                                         
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
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