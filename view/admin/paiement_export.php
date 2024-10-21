
<?php  

	require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';

	$requete="SELECT * FROM paiement_carte";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
                            <h2 align="center">PAIEMENTS DE CARTE GLOBALE</h2>
                                   <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NUM_CARTE</th>
                                                <th>CLIENT</th>
                                                <th>MONTANT</th>
                                                <th>NBRE_DE_PAIN</th>
                                                <th>MONTANT_PAYER</th>
                                                <th>B.P</th>
                                                <th>NET</th>
                                                <th>DATES</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id_op'])?></td>
                                                <td><?php  echo($et['num_carte'])?></td>
                                                <td><?php  echo($et['client'])?></td>
                                                <td><?php  echo($et['montant'])?>FC</td>
                                                <td><?php  echo($et['nbre_pain'])?></td>
                                                <td><?php  echo($et['montant2'])?>FC</td>
                                                <td><?php  echo($et['bp'])?>FC</td>
                                                <td><?php  echo($et['net'])?>FC</td>
                                                <td><?php  echo($et['date'])?></td>
                                            <td>
                                                <a onclick="return confirm('Etes-Vous sûr?')" href="../../controller/paiement.php?id=<?= $et['id_op'] ?>" class="btn btn-danger" title="Annulation de la commande">Annuler</a></td>
                                             </tr>
                                               <?php
                                               
                                            }
                                                ?>
                                        </tbody>
                                        
                                    </table>

        
    