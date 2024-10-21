
<?php  

	require_once('../../model/connexion.php');

	$requete="SELECT * FROM facture";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
                            <h2 align="center">LISTE DES FACTURES</h2>
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ENTREPRISE</th>
                                                <th>NUM_FACTURE</th>
                                                <th>DATES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['entreprise'])?></td>
                                                <td><?php  echo($et['num_facture'])?></td>
                                                <td><?php  echo($et['date'])?></td>                                         
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>

        
    