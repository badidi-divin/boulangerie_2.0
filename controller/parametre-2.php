<?php 
// *************Insert plat*******************************************
    require_once('../../model/connexion.php');

    $errors=array();
    $success=array();

if (isset($_POST['envoie2'])) {

        $nom=htmlspecialchars($_POST['nom']);
        $email=htmlspecialchars($_POST['email']);
        $adresse=htmlspecialchars($_POST['adresse']);
        $rccm=htmlspecialchars($_POST['rccm']);
        $monaie=htmlspecialchars($_POST['monaie']);
        $telephone=htmlspecialchars($_POST['telephone']);
        $taux=htmlspecialchars($_POST['taux']);

        $tmpName=$_FILES['img']['tmp_name'];
        $name=$_FILES['img']['name'];
        $size=$_FILES['img']['size'];
        $error=$_FILES['img']['error'];
        $type=$_FILES['img']['type'];

        $req=$pdo->prepare('SELECT id FROM parametre WHERE nom=?');
                    $req->execute([$_POST['nom']]);
                    $user=$req->fetch();
                    if ($user) {
                        $errors['password']='Cette entreprise exite déjà!';
                    }

        // Voir l'extension du fichiers
        $tabExtension=explode('.', $name);
        $extension=strtolower(end($tabExtension));
        // Extension Autorisé
        $extensionAutorise=['jpg','jpeg','gif','png'];
        $tailleMax=2097152;

    if (in_array($extension, $extensionAutorise)) {
        if ($size<=$tailleMax) {
                if ($error==0) {
                    $uniqueNom=uniqid('',true);
                    $fileName=$uniqueNom.'.'.$extension;
                    move_uploaded_file($tmpName,'./img/'.$fileName);
                        //Création de l'objet prepare et envoie de la requête
                        if (empty($errors)) {
                            $ps=$pdo->prepare("INSERT INTO parametre(nom,email,adresse,rccm,telephone,img,monaie,taux)VALUES(?,?,?,?,?,?,?,?)");
                            //Pour bien recupere les données on crée un table de parametre
                            $params=array($nom,$email,$adresse,$rccm,$telephone,$fileName,$monaie,$taux);
                            //Execution de la requête par leur paramètre en ordre 
                            $ps->execute($params);
                            // Pour recuperer l'id du user
                            $success['cool']="Enregistrement effectuée avec succès!";
                            $interval=3;
                            $url="creer-compte.php";
                            // header('location:blog.php');
                            header("refresh:$interval;url=$url");
                        }
                        
            }else{
                $errors['password']='Une erreur se produite lors de l\'importation de l\'image';
            }
        }else{
            $errors['password']='Votre taille est trop importante(Taille Max: 2Mo)';
        }

    }else{
        $errors['password']='Votre Extension est invalide(jpg,jpeg,gif,png)';
    }

}
    
    
// *************End Insert produit***********************************
