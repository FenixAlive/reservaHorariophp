<?php

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $disp = $_POST['disp'];
    require '../db_conn.php';
    $res = $conn->query("UPDATE horario SET disponible=$disp WHERE id=$id");
    if($res){
        echo 1;
    }else{
        echo 0;
    }
    $conn = null;
    exit();
}else {
    header("Location: ../hola.php");
}