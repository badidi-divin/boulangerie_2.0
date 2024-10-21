<?php 
    session_start();
    require_once('../../model/connexion.php');
    require_once('../../controller/select-carteuser.php');
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
		        <a href="rapport.php">Retour>>>></a>
				 <div class="row mb-4" align="left">
                    <div class="col-sm-6">                     
                    <img src="./img/<?= $userinfo['img']; ?>" width="100px" height="70px">                 
                    <h3 class="text-dark mb-1"><?= $userinfo['nom'] ?></h3>
                                         
                    <div><?= $userinfo['adresse'] ?></div>
                                            <div>Email: <?= $userinfo['email'] ?></div>
                                            <div>Phone: <?= $userinfo['telephone'] ?></div>
                                            <div>Date Aujourd'hui: <?= date('d/m/y:h-m-s') ?></div>
                                        </div>               
                </div>
                
			</div>
		</div>
				
				<!-- <img src="../img/16.gif" width="90px" height="80Px"> -->
			</div>
		<div class="container col-12">
			<div class="panel panel-default">
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-heading">
						<h4>DETAILS DE LA CARTE N°<?= $_GET['nom']." " ?> DU <?= $_GET['de']." " ?> AU  <?= $_GET['a']." " ?></h4>
					</div>
					<div class="panel-body">
						 <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>MONTANT</th>
                                                <th>NBRE_DE_PAIN</th>
                                                <th>MONTANT_PAYER</th>
                                                <th>B.P</th>
                                                <th>NET</th>
                                                <th>DATES</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id_op'])?></td>
                                               
                                                
                                                <td><?php  echo($et['montant'])?>FC</td>
                                                <td><?php  echo($et['nbre_pain'])?></td>
                                                <td><?php  echo($et['montant2'])?>FC</td>
                                                <td><?php  echo($et['bp'])?>FC</td>
                                                <td><?php  echo($et['net'])?>FC</td>
                                                <td><?php  echo($et['date'])?></td>
                                            
                                             </tr>
                                               <?php
                                               
                                            }
                                                ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="font-size:20px">Total:</th>
                                                <th ><?php
                                                    $nblmd=$pdo->prepare("SELECT SUM(montant) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$nom%' AND date>='$mot1' AND date<='$mot2' ORDER BY date");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>FC</th>
                                           <th><?php  $nblmd=$pdo->prepare("SELECT SUM(nbre_pain) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$nom%' AND date>='$mot1' AND date<='$mot2' ORDER BY date");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?></th>
                                            <th><?php  $nblmd=$pdo->prepare("SELECT SUM(montant2) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$nom%' AND date>='$mot1' AND date<='$mot2' ORDER BY date");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>Fc</th>
                                            <th><?php  $nblmd=$pdo->prepare("SELECT SUM(bp) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$nom%' AND date>='$mot1' AND date<='$mot2' ORDER BY date");
                                                    $nblmd->execute();
                                                    $nblmd=$nblmd->fetch()['prix_total'];
                                                    echo $nblmd;
                                                ?>Fc</th>
                                            <th><?php  $nblmd=$pdo->prepare("SELECT SUM(net) AS prix_total FROM paiement_carte WHERE num_carte LIKE '%$nom%' AND date>='$mot1' AND date<='$mot2' ORDER BY date");
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
	<!-- Circulation de la page -->
	
	
	<!-- Affichage inscris end -->
		
	




<!-- ***********footer Ends******************** -->
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
