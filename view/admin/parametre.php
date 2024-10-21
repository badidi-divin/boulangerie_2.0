<?php 
      session_start();
      require_once('../../controller/parametre-2.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
            <div class="container">

                <div class="login-wrap">

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
                                        
                                    </ul>
                                </div>
                                <?php endif; ?>
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>Configuration générale</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Nom de l'entreprise</label>
                                    <input class="au-input au-input--full" type="text" name="nom" placeholder="Nom entreprise" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="email" required="required">
                                </div>
                                <div class="form-group">
                                    <label> Adresse Complète</label>
                                    <textarea class="au-input au-input--full" type="text" name="adresse" placeholder="adresse"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label>RCCM</label>
                                    <input class="au-input au-input--full" type="text" name="rccm" placeholder="RCCM" required="required" value="Non disponible">
                                </div>
                                <div class="form-group">
                                    <label> LOGO</label>
                                    <input class="au-input au-input--full" type="file" name="img" placeholder="image" required="required">
                                </div>
                                <div class="form-group">
                                    <label>TELEPHONE</label>
                                    <input class="au-input au-input--full" type="number" name="telephone" placeholder="telephone" required="required" value="Non disponible">
                                </div>
                                <div class="form-group">
                                    <label>Vous gérer votre comptabilité en:</label>
                                    <input class="au-input au-input--full" type="text" name="monaie" placeholder="Fc" required="required" value="Fc">
                                </div>
                                <div class="form-group">
                                    <label>Taux 1$
                                    </label>
                                    <input class="au-input au-input--full" type="number" name="taux" placeholder="Taux" required="required" value="***">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie2">Enregistrer</button>
                                
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