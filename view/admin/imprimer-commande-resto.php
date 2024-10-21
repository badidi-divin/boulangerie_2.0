<?php
	session_start();
	require_once '../../bdd/connexion.php';
	$requete="SELECT * FROM commande_resto";
	$resultat=$pdo->query($requete);

	 $nblmd=$pdo->prepare('SELECT SUM(pt) AS prix_total FROM commande_resto');
     $nblmd->execute();
     $nblmd=$nblmd->fetch()['prix_total'];
     
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

			<div class="container headings text-center margetop" >
				
				<h5 class=" pt-1" style="font-weight: bold;">GELETO</h5>
				<!-- <img src="../img/16.gif" width="90px" height="80Px"> -->
			</div>
		<div class="container col-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
						LISTE DES COMMANDES EFFECTUES DANS LE RESTAURANT
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									 <th>N°</th>
                                     <th>ID_COM</th>
                                     <th>CLIENT</th>
                                     <th>PTOTAL($)</th>
                                     <th>DATE</th>
                                     <th></th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								 <td><?php  echo($et['id'])?></td>
                                 <td><?php  echo($et['code_commande'])?></td>
                                 <td><?php  echo($et['pt'])?></td>
                                 <td><?php  echo($et['date'])?></td>
								<!--liens -->
								<td>
											</tr>	
									<?php } ?>	
							</tbody>
							<tfoot style="background: #0a4db1; color:white;font-size: 17px !important;text-align: center !important;">
                                            <tr>
                                                <th colspan="4" style="text-align: center;">Total Montant (<?php echo $nblmd."$";?>)</th>
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
