
<?php  

	require_once('../../model/connexion.php');

	$requete="SELECT * FROM fournisseur";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
 <h2 align="center">LISTE DES FOURNISSEURS</h2>
 <table border="1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOM_COMPLET</th>
                                                <th>TYPE</th>
                                                <th>TELEPHONE</th>
                                                <th>EMAIL</th>
                                                <th>ADRESSE</th>
                                                <th>DATE</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['nom_complet'])?></td>
                                                <td><?php  echo($et['type'])?></td>
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

        
    