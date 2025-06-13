<?php
session_start();
require_once "../config/common.php";
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $getemail = textfilter($_POST["email"]);
    $getpassword = $_POST["password"];

    if($getemail && $getpassword){

        verifyuser($getemail,$getpassword);

    }else{
        header("location: ../admin/login.php?required=emailandpass");
        exit();
    }

}

function textfilter($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

function verifyuser($email,$password){
    try{
        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute([
            "email" => $email
        ]);

        $user = $stmt->fetch();

        if($user){
           if(password_verify($password,$user->password)){

                $_SESSION["user"] = $user;

                header("location: ../admin/index.php");
                exit();

           }else{
                header("location: ../admin/login.php?incorrect=password");
                exit();
           }

        }else{
            header("location: ../admin/login.php?register=email");
            exit();
        }

    }catch(PDOException $e){
        echo "Error found: ". $e->getMessage();
    }
}
