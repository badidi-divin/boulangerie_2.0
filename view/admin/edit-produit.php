<?php 
      session_start();
      require_once('../../controller/produit.php');
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
                                        <a href="produit.php">voir la liste</a>
                                    </ul>
                                </div>
                                <?php endif; ?>
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>EDITION DU PRODUIT</h3>
                            <a href="produit.php">Retour>>>></a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Designation</label>
                                    <input class="au-input au-input--full" type="text" name="designation" placeholder="Nom du produit" required="required" value="<?= $userinfo['designation']; ?>">
                                </div>
                               
                                <div class="form-group">
                                    <label> Qté Stock</label>
                                    <input class="au-input au-input--full" type="number" name="qte_stock" placeholder="Qté Stock" required="required" value="<?= $userinfo['qte_stock']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> PA</label>
                                    <input class="au-input au-input--full" type="number" name="pa" placeholder="PA" required="required" value="<?= $userinfo['pa']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> PV</label>
                                    <input class="au-input au-input--full" type="number" name="pv" placeholder="PV" required="required" value="<?= $userinfo['pv']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label> Date Expiration</label>
                                    <input class="au-input au-input--full" type="date" name="date_exp" placeholder="Code bar" required="required"  value="<?= $userinfo['date_exp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Date Entrée</label>
                                    <input class="au-input au-input--full" type="text" name="date_entree" placeholder="Code bar" required="required"  value="<?= $userinfo['date_entree']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Provenance</label>
                                    <input class="au-input au-input--full" type="text" name="provenance" placeholder="Code bar" required="required"  value="<?= $userinfo['provenance']; ?>">
                                </div>
                                <div class="form-group">
                                    <label> Depositaire</label>
                                    <input class="au-input au-input--full" type="text" name="depositaire" placeholder="Code bar" required="required"  value="<?= $userinfo['depositaire']; ?>">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie3">Edition</button>
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