<?php

session_start();
require_once "product_action.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = textfilter($_POST["name"]);
    $desc = textfilter($_POST["description"]);
    $category_id = textfilter($_POST["category_id"]);
    $quantity = textfilter($_POST["quantity"]);
    $price = textfilter($_POST["price"]);
    $image = $_FILES["image"]["name"];
    $type = $_FILES["image"]["type"];
    $tmp_name = $_FILES["image"]["tmp_name"];

    if($name && $desc && $category_id && $quantity && $price && $image){

        if($type == "image/jpeg" || $type == "image/png"){

            move_uploaded_file($tmp_name, "../admin/dist/img/$image");

            $datas = [

                "name" => $name,
                "description" => $desc,
                "category_id" => $category_id,
                "quantity" => $quantity,
                "price" => $price,
                "image" => $image

            ];

            addproduct($datas);

            echo "<script>alert('Successfully Created');window.location.href='../admin/index.php'</script>";


        }else{

            $_SESSION["datas"] = [

                "name" => $name,
                "desc" => $desc,
                "cat_id" => $category_id,
                "quantity" => $quantity,
                "price" => $price

            ];

            echo "<script>alert('Image must be jpeg or png');window.location.href='../admin/product_add.php?required=data'</script>";
            
        }    

    }else{

        $_SESSION["datas"] = [

            "name" => $name,
            "desc" => $desc,
            "category_id" => $category_id,
            "quantity" => $quantity,
            "price" => $price

        ];

        if(!$name){
            $_SESSION["nameerr"] = "Name is required";
            
        }

        if(!$desc){
            $_SESSION["descerr"] = "Description is required";

        }

        if(!$category_id){
            $_SESSION["cat_iderr"] = "Category is required";

        }

        if(!$quantity){
            $_SESSION["quanterr"] = "Quantity is required";

        }

        if(!$price){
            $_SESSION["priceerr"] = "Price is required";

        }

        if(!$image){
            $_SESSION["imageerr"] = "Image is required";

        }

        header("location: ../admin/product_add.php?required=data");

    }

}

?>