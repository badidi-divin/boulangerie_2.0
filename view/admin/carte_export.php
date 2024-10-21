
<?php  

	require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';

	$requete="SELECT * FROM carte";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
                            <h2 align="center">LISTE DES OUVERTURE DE CARTE</h2>
                                    <table class="table table-borderless table-striped table-earning" border="1">
                                        <thead>
                                            <tr>
                                                <th>CODE</th>
                                                <th>CLIENT</th>
                                                <th>MONTANT(FC)</th>
                                                <th>DATES</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['num_carte'])?></td>
                                                <td><?php  echo($et['client'])?></td>
                                                <td><?php  echo($et['montant'])?>FC</td>
                                                <td><?php  echo($et['date'])?></td>
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>

        
    