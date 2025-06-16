<?php
session_start();
require_once "category_action.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = textfilter($_POST["name"]);
    $desc = textfilter($_POST["description"]);

    if($name && $desc){
        $datas = [
        "name" => $name,
        "description" => $desc,

    ];

    addcategory($datas);

    }else{

        $_SESSION["datas"] = [

            "name" => $name,
            "desc" => $desc

        ];

        if(!$name){
            $_SESSION["nameerr"] = "Name is required";
            
        }

        if(!$desc){
            $_SESSION["descerr"] = "Description is required";

        }

        header("location: ../admin/cat_add.php?required=data");

    }

}

?>