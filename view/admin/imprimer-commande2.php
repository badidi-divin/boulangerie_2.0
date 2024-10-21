<?php 
    session_start();
    require_once('../../model/connexion.php');
    require_once('../../controller/duplicata.php');
    //require_once('../controller/tri-multiple.php');
    require_once '../../controller/parametre-select2.php';
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title> 
    <link rel="stylesheet" type="text/css" href="../css/test.css">
    <link rel="stylesheet" type="text/css" href="../css/style-client.css">
</head>
    <body style="font-size:15px">
        <!-- Navigation -->
            
            <div class="contenair col-md-6 col-xd-12 col-md-offset-3 " style="margin-top:50px;">
                <a href="commande2.php">Retour>>>></a>
                <div class="row mb-4">
                    <div class="col-sm-6"> 
                                 
                    <img src="../admin/img/<?= $userinfo['img']; ?>" width="100px" height="70px">                 
                    <h3 class="text-dark mb-1"><?= $userinfo['nom'] ?></h3>
                                         
                    <div><?= $userinfo['adresse'] ?></div>
                                            <div>Email: <?= $userinfo['email'] ?></div>
                                            <div>Phone: <?= $userinfo['telephone'] ?></div>
                                       
                    
                     </div>
                     <hr>
                     <div class="col-sm-6">                     
                        <div> Facturé à :<?= $userinfo2['client']; ?></div>
                        <div> Date Facture:<?= $userinfo2['dates']; ?></div>
                        <div> N°Fact:<?= $userinfo2['id']; ?></div>
                         <div> Reglement:<?= $userinfo2['reglement']; ?></div>
                        <a onclick="window.print();">ici</a>  
                    </div> 
                    <hr>              
                </div>
                <!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
                <div class="panel panel-info spacer">
                    <!-- titre dans bootstrap -->
                    <!-- Le corps du tableau où l'on mettra le contenu -->
                    <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr style="background-color:darkgray;">

                                        <th>LIBELLE</th><th>PU</th><th>QTE</th>
                                    </tr>   
                                </thead>

                                <tbody>
                                
                                     <?php while ($et=$resultat->fetch()){?>
                                        <tr>      
                                                <td><?php  echo($et['plat'])?></td>
                                                <td><?php  echo($et['prix']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['qte_com'])?></td>
                                                </tr>
                                        <?php } ?>
                                        
                                </tbody>
                            </table>
                                    <p>Reduction:<?php echo $userinfo2['red']; ?><?= $userinfo['monaie'] ?></p><br>

                                    <p style="font-weight: bold;">Montant Payé:<?php echo $userinfo2['net']; ?><?= $userinfo['monaie'] ?></p><br>
                                    <p style="font-weight:bold">DUPLICATA</p>
                                    </td>
                                                    </tr>
                                         
                    </div>
                </div>  
            </div>
    <!-- Circulation de la page -->
    <!-- **********************Code Javascript*********************-->
    <script src="../admin/js/jquery.min.js"></script>
    <script src="../admin/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
        $(document).ready(function(){
            window.print();
        });
    
    </script>
    </body>
</html>

