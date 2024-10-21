<?php 
    session_start();
    require_once('../model/connexion.php');
    require_once('../controller/function_panier.php');
    require_once('../controller/pannier.php');
    require_once '../controller/parametre-select2.php';
    require_once('../controller/commande.php');
    require_once('../controller/proforma.php');
    if (isset($_POST['search'])) {
        $designation=$_POST['mot1'];
        $requser=$pdo->prepare("SELECT * FROM stock WHERE designation=?");
        $requser->execute(array($designation));
        $userinfo=$requser->fetch();
        ?>
        <script type="text/javascript">
            window.open('?action=ajout&l=<?= $userinfo['designation']?>&q=1&p=<?= $userinfo['pu'] ?>','_self')
        </script>
        <?php

        exit();
    }
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title> 
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/style-client.css">
    <link rel="stylesheet" href="../Vendor/auto-completion/style-n.css">
    <link rel="stylesheet" href="../Vendor/auto-completion/jquery-ui.css">
    <link rel="stylesheet" href="../Vendor/auto-completion/jquery-ui.min.css">
</head>
    <body>
        <!-- Navigation -->
            <div class="container col-12">
                <a href="admin/rapport.php">Retour>>>></a>
                <div class="panel panel-danger">
                <div class="panel-heading">
                    Produit(s) commandé(s)
                </div>
                <div class="panel-body">
                    <form method="post" action="" class="form-inline">
                        <div class="form-group">
                            <select name="mot1" class="form-control">Choisissez
                                    <?php
                                        $ps=$pdo->prepare("SELECT * FROM stock WHERE qte_stock>0");
                                        $ps->execute();
                                        ?>
                                            <option disabled="disabled">
                                                Choisissez une rubrique
                                            </option>
                                            <?php
                                        while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <option value="<?php echo $s->designation; ?>">
                                                <?php echo $s->designation."-Qte=".$s->qte_stock; ?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                            </select>
                        </div>
                         <button type="submit" class="btn btn-success" name="search">
                        Ajouter</button>
                        
                        <!-- Permet de créer des espaces -->
                    </form>
                </div>
                    <!-- titre dans bootstrap -->
                    <div class="panel-heading">
                        VOTRE PANIER
                    </div>  
                    <!-- Le corps du tableau où l'on mettra le contenu -->
                    <div class="panel-body">
                        <form method="post" action="">
                            <div class="form-group">
                            <label for="propri">Choix du client:</label>
                            <select name="cli" class="form-control" autocomplete="off" required="required">
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
                                        <option>
                                            <?php echo $s->nom_complet; ?>
                                        </option>
                                        <?php
                                    }

                                ?>
                            </select>
                        </div>
                         <?php
                        if ($_SESSION['role']=="admin-1" || $_SESSION['role']=="admin-2") {
                            ?> 
                        <div class="form-group">
                            <label for="propri">Montant Reduction(<?= $userinfo['monaie'] ?>):</label>
                            <input type="number" name="red" class="form-control" placeholder="Mettez la Reduction" value="0" required>
                        </div>
                         <div class="form-group">
                            <label for="propri">Reglement</label>
                            <select class="form-control" name="reglement">
                                <option value="Cash">Cash</option>
                                <option value="Non Cash">Non Cash</option>
                            </select>
                        </div>
                        <?php
                        
                        } 
                        
                        ?> 
                            <table class="table table-striped" style="font-size:15px;">
                                <thead>
                                    <tr>
                                        <th>LIBELLE</th><th>PU</th><th>QTE</th>
                                    </tr>
                                    <?php
                                    if(isset($_GET['deletepanier'])&& $_GET['deletepanier']==true){
                                        supprimerpanier();
                                    }
                                    if(creationPanier()){
                                    $nbProduits= count($_SESSION['panier']['libelleproduit']);
                                    if($nbProduits <= 0 ){
                                        echo '<p style="color:red;font-size:50px;"><b>Desolé,panier vide!</b></p>';
                                    }else{
                                        $total=montantglobal();
                                        //$paypal=new paypal();
                                        $params=array();
                                            
                                        for($i=0;$i<$nbProduits;$i++ ){
                                            ?>
                                </thead>

                                <tbody>
                                    <td><br><?php echo $_SESSION['panier']['libelleproduit'][$i]; ?></td>
                                    <td><br><?php echo $_SESSION['panier']['prixproduit'][$i]; ?><?= $userinfo['monaie'] ?></td>
                                    <td><br><input type="number" name="q[]" value="<?php echo $_SESSION['panier']['qteproduit'][$i]; ?>" size="5"></td>
                                    <td><br><a href="?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['libelleproduit'] [$i]); ?>">Supprimer</a></td>
                                                    <tr>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>

                                                        <td colspan="8">
                                                        <p style="font-size:20px;font-weight: bold;">Montant à Payer :<?php echo montantglobal(); ?><?= $userinfo['monaie'] ?></p><br>

                                    
                                                        </td>
                                                    </tr>
                                                
                                                      <tr>
                                                        <td colspan="4">
                                                            <input type="submit" class="btn btn-primary" value="Actualiser votre panier">
                                                            <input type="hidden" name="action" value="refresh">
                                                            <a href="?deletepanier=true" class="btn btn-danger">Supprimer le panier</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                
                                                }
                                            }

                                           ?>                                    
                                    </tr>   
                                    
                                </tbody>
                            </table>
                        <div class="form-group">
                            <button type="submit" name="envoie"  class="btn btn-success">Valider la Commande</button>
                             <button type="submit" name="envoie2"  class="btn btn-primary">Proforma</button>
                        </div>
                        </form>
                    </div>
                </div>  
            </div>
    <!-- Circulation de la page -->
    </body>
    <script src="../Vendor/auto-completion/jquery.min.js"></script>
    <script src="../Vendor/auto-completion/jquery-3.2.1.min.js"></script>
    <script src="../Vendor/auto-completion/jquery-ui.min.js"></script>
    <script src="../Vendor/auto-completion/script.js"></script>
</html>

