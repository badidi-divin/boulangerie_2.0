<?php
	session_start();
    require_once('../../model/connexion.php');
    $requeteprint="SELECT * FROM stock WHERE qte_stock>0 AND qte_stock<10";   
    $resultatprint=$pdo->query($requeteprint);
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

	<div class="container col-12">
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
						LISTE DES PRODUITS (STOCK CRITIQUE)
					</div>

					<div class="panel-body">
						               <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>DESIGNATION</th>
                                                <th>QTE STOCK</th>
                                                <th>PRIX</th>
                                                <th>DATE_ENREG</th>                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultatprint->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['code'])?></td>
                                                <td><?php  echo($et['designation'])?></td>
                                                <td><?php  echo($et['qte_stock'])?></td>
                                                
                                                <td><?php  echo($et['pu']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['date_enreg'])?></td>                                        
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
					</div>
				</div>	
			</div>

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
