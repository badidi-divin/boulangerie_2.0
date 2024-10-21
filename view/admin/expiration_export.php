
<?php  

	require_once('../../model/connexion.php');
    require_once '../../controller/parametre-select2.php';

	$requete="SELECT * FROM plat";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>


                            <h4 align="center">LISTE DE L'ETAT D'EXPIRATION DES PRODUITS APPROVISIONNES</h4>
                                    <table border="1">
                                    <thead>
                                            <tr>
                                                
                                                <th>DESIGNATION</th>
                                                <th>ETAT</th>
                                                <th>DATE_EXPIRATION</th>
                                                <th>DATE_ENTREE</th>
                                                <th>DATE_AUJOURD'HUI</th>
                                                <th>FACTURE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['designation'])?></td>
                                                 <td><?php   
                                                        $date_exp=strtotime($et['date_exp']);
                                                        $date_now=strtotime(date("Y-m-d"));
                                                        $expirer=$date_exp-$date_now;
                                                        if ($expirer>0) {
                                                            echo '<p style="color:green">'."Produit non expiré!".'</p>';
                                                        }else{
                                                            echo '<p style="color:red">'."Produit expiré!".'</p>';
                                                        }
                                                ?></td>
                                                <td><?php  echo($et['date_exp'])?></td>
                                                <td><?php  echo($et['date_entree'])?></td>
                                                <td><?php  echo date("Y-m-d")?></td>

                                                <td><?php  echo($et['type'])?></td>
                                         
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>

        
</html>