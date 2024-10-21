<?php 
      session_start();
      require_once('../../controller/carte.php');
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
                                        <a href="carte.php">voir la liste</a>
                                    </ul>
                                </div>
                                <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
                    
                            <h3 align="center">AJOUTER</h3>
                            <a href="carte.php">Retour>>>></a>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client" class="form-control">Choisissez
                                    <?php
                                        $ps=$pdo->prepare("SELECT * FROM client");
                                        $ps->execute();
                                        ?>
                                            <option disabled="disabled">
                                                Choisissez une rubrique
                                            </option>
                                            <?php
                                        while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <option value="<?php echo $s->nom_complet; ?>">
                                                <?php echo $s->nom_complet; ?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                            </select>
                                </div>
                                <div class="form-group">
                                    <label>Montant (FC)</label>
                                    <input class="form-control" type="text" name="montant" placeholder="xxxxxx" value="<?php echo $userinfo['montant']; ?>">
                                </div>
                                <div class="form-group" align="center">
                                    <button class="btn btn-success" type="submit" name="envoie2">Edition</button>
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