<?php 
      session_start();
      require_once('../../controller/user.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>
<body style="background-color: blacks;">
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
                                        <a href="utilisateur.php">voir la Liste</a>
                                    </ul>
                                </div>
                                <?php endif; ?>
                    <div class="login-content">

                        <div class="login-logo">
                            <h3>EDITION</h3>
                            <a href="utilisateur.php">Retour>>>></a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Nom utilisateur</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Nom d'utilisateur" required="required" value="<?= $userinfo['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mot de Passe</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="xxxxxxxxxxxxxxxxxxxxx">
                                </div>
                                <div class="form-group">
                                    <label>Rôle</label>
                                    <select class="form-control" name="role">
                                        <option disabled>
                                            choisissez un rôle
                                        </option>
                                        <option value="admin-1">
                                            admin-1
                                        </option>
                                        <option value="admin-2">
                                            admin-2
                                        </option>
                                        <option value="Caissier(e)">
                                            Caissier(e)
                                        </option>
                                         <option value="Vendeur">
                                            Vendeur
                                        </option>
                                    </select>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie7">Edition</button>
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