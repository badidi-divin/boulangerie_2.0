<?php 
      session_start();
      require_once('../../controller/cookie-config.php');
      require_once('../../controller/user.php');
      
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>

<body style="background-color: blacks;">
    <div class="page-wrapper">
        <div class="page-content--bge5">
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
                    <div class="login-content">

                        <div class="login-logo">
                            <h3>AUTHENTIFICATION</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Nom utilisateur</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Nom d'utilisateur">
                                </div>
                                <div class="form-group">
                                    <label>Mot de Passe</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="customCheck1" name="rememberme"
                                            />
                                            <label class="custom-control-label" for="customCheck1"
                                                >Se Souvenir de Moi</label
                                            > 
                                        </div>

                                    </div>
                                <div class="form-group" align="center">
                                  <button class="btn btn-danger" type="submit" name="envoie2">Se Connecter</button>  
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>