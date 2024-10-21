<?php 
      session_start();
      require_once('../../controller/produit.php');
      require_once('securite.php');
      require_once '../../controller/parametre-select2.php';
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
                            <h3>AJOUT DU PRODUIT</h3>
                            <a href="produit.php">Retour>>>></a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Numéro Facture Fournisseur</label>
                                    <select name="type" class="form-control">Choisissez
                                    <?php
                                        $ps=$pdo->prepare("SELECT * FROM facture");
                                        $ps->execute();
                                        ?>
                                            <option disabled="disabled">
                                                Choisissez une rubrique
                                            </option>
                                            <?php
                                        while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <option value="<?php echo $s->num_facture; ?>">
                                                <?php echo $s->num_facture."(".$s->entreprise.")"; ?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                            </select>
                                </div>
                                <div class="form-group">
                                    <label> Designation Produit</label>
                                    <input class="au-input au-input--full" type="text" name="designation" placeholder="Nom du produit" required="required">
                                </div>
                                <div class="form-group">
                                    <label> Qté Stock</label>
                                    <input class="au-input au-input--full" type="number" name="qte_stock" placeholder="Qté Stock" required="required">
                                </div>
                                <div class="form-group">
                                    <label> PA(<?= $userinfo['monaie']?>)</label>
                                    <input class="au-input au-input--full" type="number" name="pa" placeholder="PA" required="required">
                                </div>
                                <div class="form-group">
                                    <label> PV(<?= $userinfo['monaie']?>)</label>
                                    <input class="au-input au-input--full" type="number" name="pv" placeholder="PV" required="required">
                                </div>
                               
                                <div class="form-group">
                                    <label> Date Expiration</label>
                                    <input class="au-input au-input--full" type="date" name="date_exp" placeholder="Date Expiration" required="required" value="RAS">
                                </div>
                                <div class="form-group">
                                    <label> Date d'Entrée</label>
                                    <input class="au-input au-input--full" type="date" name="date_entree" placeholder="Date d'Entrée" required="required" value="RAS">
                                </div>
                                <div class="form-group">
                               
                                    <input hidden="hidden" class="au-input au-input--full" type="text" name="provenance" placeholder="Date Expiration" required="required" value="RAS">
                                </div>
                                <div class="form-group">
                                    <label> Depositaire</label>
                                    <input class="au-input au-input--full" type="text" name="depositaire" placeholder="Depositaire" required="required" value="RAS">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie2">Ajouter</button>
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