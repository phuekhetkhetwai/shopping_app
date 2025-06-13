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
    echo "<script>alert('Successfully Created.');window.location.href='../admin/category.php'</script>";

    }else{

        if(!$name){
            $_SESSION["nameerr"] = "* Name is required";
            
        }

        if(!$desc){
            $_SESSION["descerr"] = "* Description is required";

        }

        header("location: ../admin/cat_add.php");

    }

}

?>