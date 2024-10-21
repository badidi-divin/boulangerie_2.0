<?php 
    $erreur=false;
    $action=(isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));
    if($action!==null){
    if(!in_array($action, array('ajout','suppression','refresh')))

    //declaration des variables
        $erreur=true;
        $l=(isset($_POST['l'])?$_POST['l']:(isset($_GET['l'])?$_GET['l']:null));
        $q=(isset($_POST['q'])?$_POST['q']:(isset($_GET['q'])?$_GET['q']:null));
        $p=(isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));
        //affectation des variables
       $l=preg_replace('#\v#', '', $l);
       $p=floatval($p);
       //tester la valeur de la quantité
       if(is_array($q)){

    $qteproduit=array();
    $i=0;
    foreach ($q as $contenu) {
        # code...
    $qteproduit[$i++]=intval($contenu);

    }


       }else{

    $q=intval($q);


       }


    }
    if(!$erreur){
    switch ($action) {
        case 'ajout':
            # code...
            ajouterArticle($l,$q,$p);
            break;
            case 'suppression':
            # code...
            supprimerArticle($l);
            break;
            case 'refresh':
            # code...
            for ($i=0; $i < count($qteproduit) ; $i++) { 
                # code...
    Modifierqteproduit($_SESSION['panier']['libelleproduit'][$i],round($qteproduit[$i]));
            }

            break;
        
            default:
            # code...
            break;
    }
    }