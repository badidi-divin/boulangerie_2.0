
<?php  

	require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';

	$requete="SELECT * FROM stock";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
                            <h2 align="center">LISTE DES PRODUITS EN STOCK</h2>
                                    <table border="1">
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
                                           
                                         
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        
                                        </table>
                                    </tbody>                                

        
    