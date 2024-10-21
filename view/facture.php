<?php 
    session_start();
    require_once('../model/connexion.php');
    require_once('../controller/function_panier.php');
    require_once('../controller/pannier.php');
    //require_once('../controller/tri-multiple.php');
    require_once '../controller/parametre-select2.php';
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title> 
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/style-client.css">
</head>
    <body style="font-size:15px">
        <!-- Navigation -->
            
            <div class="contenair col-md-6 col-xd-12 col-md-offset-3 " style="margin-top:50px;">
                <a href="pannier.php">Retour>>>></a>
                <div class="row mb-4">
                    <div class="col-sm-6"> 
                                 
                    <img src="admin/img/<?= $userinfo['img']; ?>" width="100px" height="70px">                 
                    <h3 class="text-dark mb-1"><?= $userinfo['nom'] ?></h3>
                                         
                    <div><?= $userinfo['adresse'] ?></div>
                                            <div>Email: <?= $userinfo['email'] ?></div>
                                            <div>Phone: <?= $userinfo['telephone'] ?></div>
                                       
                    
                     </div>
                     <hr>
                     <div class="col-sm-6">                     
                        <div> Facturé à :<?= $_SESSION['cli']; ?></div>
                        <div> Date Facture:<?= date('d/m/y'); ?></div>
                        <div> N°Fact:<?= $_SESSION['dk']; ?></div>
                         <div> Reglement:<?= $_SESSION['reglement']; ?></div>
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
                                    <?php
                                    if(isset($_GET['deletepanier'])&& $_GET['deletepanier']==true){
                                        supprimerpanier();
                                    }
                                    if(creationPanier()){
                                    $nbProduits= count($_SESSION['panier']['libelleproduit']);
                                    if($nbProduits <= 0 ){
                                        echo '<p style="color:red;font-size:50px;"><b>Desolé,panier vide!</b></p>';
                                    }else{
                                        $total=montantglobal();
                                        //$paypal=new paypal();
                                        $params=array(

                                            // 'RETURNURL'=>'http://127.0.0.1/Site e-commerce/process.php';

                                        );
                                            ?>
                                       
                                </thead>

                                <tbody>
                                    <?php  for($i=0;$i<$nbProduits;$i++ ){
                                            ?>
                                    <tr>
                                        <td><?php echo $_SESSION['panier']['libelleproduit'][$i]; ?></td>
                                        <td><?php echo $_SESSION['panier']['prixproduit'][$i]; ?><?= $userinfo['monaie'] ?></td>
                                        <td><?php echo $_SESSION['panier']['qteproduit'][$i]; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            
                                    <p>Reduction:<?php echo $_SESSION['remise']; ?><?= $userinfo['monaie'] ?></p><br>

                                    <p style="font-weight: bold;">Montant à Payer:<?php echo $_SESSION['net']; ?><?= $userinfo['monaie'] ?></p><br>

                                                        </td>
                                                    </tr>

                                                    <?php
                                                
                                                }
                                            }

                                           ?> 
                    </div>
                </div>  
            </div>
    <!-- Circulation de la page -->
    <!-- **********************Code Javascript*********************-->
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
        $(document).ready(function(){
            window.print();
        });
    
    </script>
    </body>
</html>

