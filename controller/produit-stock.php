<?php 
// ******Supprimer plat**********************************************
    if(isset($_GET['id'])){

    $id=$_GET['id'];
    
    require_once('../model/connexion.php');

    $ps=$pdo->prepare("DELETE FROM stock WHERE code=?");

    $params=array($id);

    $ps->execute($params);
    
    header("location:".$_SERVER['HTTP_REFERER']);
    
    }
// ******End Supprimer plat******************************************