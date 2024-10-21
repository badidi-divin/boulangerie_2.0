<?php 
		require_once('../../model/connexion.php');

		$requser=$pdo->prepare("SELECT * FROM parametre WHERE id=?");
		$requser->execute(array($_GET['id']));
		$userinfo=$requser->fetch();
		$id=$_GET['id'];

		if (isset($_POST['envoie2'])) {

        $nom=htmlspecialchars($_POST['nom']);
        $email=htmlspecialchars($_POST['email']);
        $adresse=htmlspecialchars($_POST['adresse']);
        $rccm=htmlspecialchars($_POST['rccm']);
        $monaie=htmlspecialchars($_POST['monaie']);
        $telephone=htmlspecialchars($_POST['telephone']);
        $taux=htmlspecialchars($_POST['taux']);
        $name=$_FILES['img']['name'];

        if ($name=="") {
            //Création de l'objet prepare et envoie de la requête
            $ps=$pdo->prepare("UPDATE parametre SET nom=?,email=?,adresse=?,rccm=?,telephone=?,monaie=?,taux=? WHERE id=?");
            //Pour bien recupere les données on crée un table de parametre
            $params=array($nom,$email,$adresse,$rccm,$telephone,$monaie,$taux,$id);
            //Execution de la requête par leur paramètre en ordre 
            $ps->execute($params);
            // Pour recuperer l'id du user
            $success['cool']="Modification effectuée avec succès!";
        }else{
			$tmpName=$_FILES['img']['tmp_name'];
        
        $size=$_FILES['img']['size'];
        $error=$_FILES['img']['error'];
        $type=$_FILES['img']['type'];

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
                            $ps=$pdo->prepare("UPDATE parametre SET nom=?,email=?,adresse=?,rccm=?,telephone=?,img=?,monaie=? WHERE id=?");
                            //Pour bien recupere les données on crée un table de parametre
                            $params=array($nom,$email,$adresse,$rccm,$telephone,$fileName,$monaie,$id);
                            //Execution de la requête par leur paramètre en ordre 
                            $ps->execute($params);
                            // Pour recuperer l'id du user
                            $success['cool']="Modification effectuée avec succès!";
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

        
}