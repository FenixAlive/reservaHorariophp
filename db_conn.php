<?php
$sName = "localhost";
$uName = "id15928207_fenix";
$pass = "l0MJ!pcx|EGqFoq[";
$db_name = "id15928207_horarios";

try{
    $conn = new PDO("mysql:host=$sName;dbname=$db_name",$uName,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e){
    $err = $e->getMessage();
    echo '<div class="errsql">Connection Failed : $err</div>' ;
}