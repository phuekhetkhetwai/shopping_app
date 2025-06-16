<?php
session_start();
require_once "category_action.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];
    $name = textfilter($_POST["name"]);
    $desc = textfilter($_POST["description"]);

    if($name && $desc){
        $datas = [
        "id" => $id,
        "name" => $name,
        "description" => $desc,

    ];

    updatecategory($datas);

    }else{

        if(!$name){
            $_SESSION["nameerr"] = "Name is required";
            
        }

        if(!$desc){
            $_SESSION["descerr"] = "Description is required";

        }

        header("location: ../admin/cat_edit.php?id=$id");

    }

}

?>