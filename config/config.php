<?php

$dbhost = "localhost";
$dbname = "ap_shopping";
$dbuser = "root";
$dbpass = "";

$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

try{
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass,$option);

}catch(PDOException $e){
    die("Connection failed ". $e->getMessage());
}


?>