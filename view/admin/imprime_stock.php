<?php
	session_start();
	require_once '../../model/connexion.php';
    require_once '../../controller/parametre-select2.php';
	$requete="SELECT * FROM stock";
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
		<a href="stock.php">Retour>>>></a>
				<div class="row mb-4" align="left">
                    <div class="col-sm-6">                     
                    <img src="./img/<?= $userinfo['img']; ?>" width="100px" height="70px">                 
                    <h3 class="text-dark mb-1"><?= $userinfo['nom'] ?></h3>
                                         
                    <div><?= $userinfo['adresse'] ?></div>
                                            <div>Email: <?= $userinfo['email'] ?></div>
                                            <div>Phone: <?= $userinfo['telephone'] ?></div>
                                        </div>
                    <div align="right">
                	<h4><?= date('d/m/y'); ?></h4>
                </div>
                                       
                                    
                </div>
                
			</div>
		</div>
				
				<!-- <img src="../img/16.gif" width="90px" height="80Px"> -->
			</div>
		<div class="container col-12">
			<div class="panel panel-primary">
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-heading">
						LISTE DES PRODUITS EN STOCK
					</div>
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>DESIGNATION</th>
                                                <th>QTE STOCK</th> 
                                                <th>PU</th>
                                                <th>DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['code'])?></td>
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
                                            <td><?php  echo($et['pu']." ".$userinfo['monaie'])?></td>
                                            <td><?php  echo($et['date_enreg'])?></td>
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
