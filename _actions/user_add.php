<?php
session_start();
require_once "user_action.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = textfilter($_POST["name"]) ?? "";
    $email = textfilter($_POST["email"]) ?? "";
    $password = textfilter($_POST["password"]) ?? "";
    $address = textfilter($_POST["address"]) ?? "";
    $phone = textfilter($_POST["phone"]) ?? "";

    if($name && $email && $password && $address && $phone && (strlen($password) > 5)){

        $user = getuser($email);

        if(!$user){
            $password = password_hash($password,PASSWORD_DEFAULT);

            $datas = [

                "name" => $name,
                "email" => $email,
                "password" => $password,
                "address" => $address,
                "phone" => $phone

            ];

            adduser($datas);

        }else{

            echo "<script>alert('Your email is already register!!');window.location.href='../admin/user_list.php'</script>";
            
        }

    }else{

        $_SESSION["datas"] = [

            "name" => $name,
            "email" => $email,
            "password" => $password,
            "address" => $address,
            "phone" => $phone

        ];

        if(!$name){
            $_SESSION["nameerr"] = "Name is required";
            
        }

        if(!$email){
            $_SESSION["emailerr"] = "Email is required";

        }

        if(!$password){
            $_SESSION["passerr"] = "Password is required";

        }elseif(!(strlen($password) > 5)){
            $_SESSION["passerr"] = "Password should be long";
        }

        if(!$address){
            $_SESSION["adderr"] = "Address is required";

        }

        if(!$phone){
            $_SESSION["pherr"] = "Phone is required";

        }

        header("location: ../admin/user_add.php?required=data");

    }

}

?>