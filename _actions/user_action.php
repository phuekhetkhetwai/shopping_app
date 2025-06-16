<?php
require_once "../config/config.php";

function allusers(){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT * FROM users");
        $stmt->execute();
        $datas = $stmt->fetchall();

        return $datas;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function getuser($email){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute([
            "email" => $email
        ]);

        $data = $stmt->fetch();

        return $data;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function adduser($datas){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("INSERT INTO users(name,email,password,address,phone) VALUE (:name,:email,:password,:address,:phone)");
        $stmt->execute($datas);

        echo "<script>alert('Successfully Created.');window.location.href='../admin/user_list.php'</script>";


    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

function deleteuser($id){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("DELETE FROM users WHERE id=:id");
        $stmt->execute([
            "id" => $id
        ]);

        echo "<script>window.location.href='../admin/user_list.php'</script>";


    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

function textfilter($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

?>