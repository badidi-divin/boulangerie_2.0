<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="social_pharma";

    $connect=mysqli_connect($host,$username,$password,$database);
    $sql="SELECT * FROM plat WHERE qte_stock>0";
    $results=mysqli_query($connect,$sql);
    $json_array=array();

    while($data=mysqli_fetch_assoc($results)){
        $json_array[]=$data;
    }
    echo json_encode($json_array);