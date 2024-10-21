<?php 
      session_start();
      require_once('../../controller/paiement.php');
      require_once('securite.php');
 ?>
<!DOCTYPE html>
<html lang="en">
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
<div class="contenair space col-md-6 col-xd-12 col-md-offset-3">
    <!-- panel default ce n'est que la couleur qui va changer -->
    <?php
                        if (!empty($errors)):
                                ?>
                                <div class="alert alert-danger">
                                    <p></p>
                                    <ul>
                                        <?php foreach($errors as $error):?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>

                                <?php
                                if (!empty($success)):
                                ?>
                                <div class="alert alert-success">
                                    <p></p>
                                    <ul>
                                        <?php foreach($success as $succes):?>
                                            <li><?= $succes; ?></li>
                                        <?php endforeach; ?>
                                        <a href="paiement_carte.php">voir la liste</a>
                                    </ul>
                                </div>
                                <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
                    
                            <h3 align="center">PAIEMENT DE LA CARTE</h3>
                            <a href="paiement_carte.php">Retour>>>></a>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Numéro Carte</label>
                                    <select name="carte" class="form-control">Choisissez
                                    <?php
                                        
                                        $ps=$pdo->prepare("SELECT * FROM carte");
                                        $ps->execute();
                                        ?>
                                            <option disabled="disabled">
                                                Choisissez une rubrique
                                            </option>
                                            <?php
                                        while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <option value="<?php echo $s->num_carte; ?>">
                                                <?php echo "Numéro:".$s->num_carte."-Name:".$s->client."-Montant:".$s->montant; ?>Fc
                                            </option>
                                            <?php
                                        }
                                    ?>
                            </select>
                                </div>
                                <div class="form-group">
                                    <label>Nbre de Pain</label>
                                    <input class="form-control" type="number" name="nbre_pain" placeholder="xxxxxx">
                                </div>
                                <div class="form-group">
                                    <label>Montant Payer(Fc)</label>
                                    <input class="form-control" type="number" name="montant_2" placeholder="xxxxxx" value="0">
                                </div>
                                <div class="form-group" align="center">
                                    <button class="btn btn-success" type="submit" name="envoie2">Payer</button>
                                </div>
                            </form>
            
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once('footer.php'); ?>
</body>
</html>
<!-- end document-->