<?php
	session_start();
	require_once '../../controller/client.php';
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
						LISTE DES CLIENTS  <a onclick="window.print();">ici</a>
					</div>
					<div class="panel-body">
						              <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOM_COMPLET</th>
                                                <th>SEXE</th>
                                                <th>TELEPHONE</th>
                                                <th>EMAIL</th>
                                                <th>ADRESSE</th>
                                                <th>DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultatprint->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['nom_complet'])?></td>
                                                <td><?php  echo($et['sexe'])?></td>
                                                <td>+<?php  echo($et['telephone'])?></td>
                                                <td><?php  echo($et['email'])?></td>
                                                <td><?php  echo($et['adresse'])?></td>
                                                <td><?php  echo($et['date'])?></td>
                                             
                                             </tr>
                                               <?php
                                            }
                                                ?>
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
