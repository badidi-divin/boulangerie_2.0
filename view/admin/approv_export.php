
<?php  

	require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';

	$requete="SELECT * FROM plat";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
                            <h2 align="center">LISTE DES APPROVISIONNEMENTS</h2>
                                    <table border="1">
                                    <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FACTURE_FOURNISSEUR</th>
                                                <th>DESIGNATION</th>
                                                <th>QTE STOCK</th>
                                                <th>PA</th>
                                                <th>PV</th>
                                                <th>DATE_EXPIRATION</th>
                                                <th>DATE_ENTREE</th>
                                                
                                                <th>DEPOSITAIRE</th>
                                                <th>RECEPTIONNISTE</th>
                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['type'])?></td>
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
                                                <td><?php  echo($et['pa']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['pv']." ".$userinfo['monaie'])?></td>
                                                <td><?php  echo($et['date_exp'])?></td>
                                                <td><?php  echo($et['date_entree'])?></td>
                                              
                                                <td><?php  echo($et['depositaire'])?></td>
                                                <td><?php  echo($et['user'])?></td>                                       
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>

        
    