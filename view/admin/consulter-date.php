<?php
	session_start();
	require_once '../../bdd/connexion.php';
	$d=$_SESSION['date_p'];
	$requete="SELECT * FROM detail_commande WHERE date LIKE '%$d%'";
	$resultat=$pdo->query($requete);
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
						DETAIL DES PRODUITS COMMANDES DU <?php echo  $_SESSION['date_p'] ?>
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>N°</th>
                                    <th>ID_COM</th>
                                    <th>PLAT</th>
                                    <th>QTE_COM</th>
                                    <th>PRIX</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								 <td><?php  echo($et['id'])?></td>
                                 <td><?php  echo($et['code_commande'])?></td>
                                 <td><?php  echo($et['plat'])?></td>
                                 <td><?php  echo($et['qte_com'])?></td>
                                 <td><?php  echo($et['prix'])?></td>
								<!--liens -->
								<td>
											</tr>	
									<?php } ?>	
							</tbody>
						</table>
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
	
	
	<!-- Affichage inscris end -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	
        $(document).ready(function(){
            window.print();
        });
    
	</script>
</body>
</html>
