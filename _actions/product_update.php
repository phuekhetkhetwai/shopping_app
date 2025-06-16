<?php

session_start();
require_once "product_action.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_POST["id"];
    $name = textfilter($_POST["name"]);
    $desc = textfilter($_POST["description"]);
    $category_id = textfilter($_POST["category_id"]);
    $quantity = textfilter($_POST["quantity"]);
    $price = textfilter($_POST["price"]);
    $image = $_FILES["image"]["name"];
    $type = $_FILES["image"]["type"];
    $tmp_name = $_FILES["image"]["tmp_name"];

    if($name && $desc && $category_id && $quantity && $price){

        if(!$image){

            $datas = [
                    "id" => $id,
                    "name" => $name,
                    "description" => $desc,
                    "category_id" => $category_id,
                    "quantity" => $quantity,
                    "price" => $price

                ];

                updateproduct($datas);

                echo "<script>alert('Successfully Updated');window.location.href='../admin/index.php'</script>";


        }else{

            if($type == "image/jpeg" || $type == "image/png"){

                move_uploaded_file($tmp_name, "../admin/dist/img/$image");

                $datas = [
                    "id" => $id,
                    "name" => $name,
                    "description" => $desc,
                    "category_id" => $category_id,
                    "quantity" => $quantity,
                    "price" => $price,
                    "image" => $image

                ];

                updateproduct($datas);

                echo "<script>alert('Successfully Updated');window.location.href='../admin/index.php'</script>";


            }else{

                $_SESSION["datas"] = [

                    "name" => $name,
                    "desc" => $desc,
                    "cat_id" => $category_id,
                    "quantity" => $quantity,
                    "price" => $price

                ];

                echo "<script>alert('Image must be jpeg or png');window.location.href='../admin/product_edit.php?id=$id&required=data'</script>";
                
            }  
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

        header("location: ../admin/product_edit.php?id=$id&required=data");

    }

}

?>