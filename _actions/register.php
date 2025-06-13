<?php
session_start();
require_once "../config/config.php";
require_once "../config/common.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = textfilter($_POST["name"]);
    $email = textfilter($_POST["email"]);
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $address = textfilter($_POST["address"]);
    $phone = textfilter($_POST["phone"]);

    
}

function textfilter($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

?>