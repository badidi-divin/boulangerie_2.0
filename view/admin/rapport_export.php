
<?php  

	require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';

	$requete="SELECT * FROM commande";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
                            <h2 align="center">LISTE DES COMMANDES</h2>
                                    <table border="1">
                                    <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CLIENT</th>
                                                <th>USERNAME</th>
                                                <th>REGLEMENT</th>
                                                <th>PT</th>
                                                <th>REMISE</th>
                                                <th>NET</th>
                                                <th>DATES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['client'])?></td>
                                                <td><?php  echo($et['username'])?></td>
                                                <td><?php  echo($et['reglement'])?></td>
                                                <td><?php  echo($et['pt']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['red']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['net']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['dates'])?></td>
                                           
                                         
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        
                                        </table>
                                    </tbody>                                

        
    