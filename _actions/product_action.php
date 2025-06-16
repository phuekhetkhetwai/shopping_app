<?php
require_once "../_actions/category_action.php";
require_once "../config/config.php";

function allproducts(){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT products.*, categories.name AS cat_name 
        FROM products 
        LEFT JOIN categories ON products.category_id = categories.id");
        $stmt->execute();
        $datas = $stmt->fetchall();

        return $datas;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function getproduct($id){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT * FROM products WHERE id=:id");
        $stmt->execute([
            "id" => $id
        ]);
        $data = $stmt->fetch();

        return $data;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function addproduct($datas){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("INSERT INTO products(name,description,category_id,quantity,price,image,created_at) VALUE (:name,:description,:category_id,:quantity,:price,:image,NOW())");
        $stmt->execute($datas);

    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

function updateproduct($datas){

    try{

        $db = $GLOBALS["db"];
        
        if(!$datas["image"]){
            
            $stmt = $db->prepare("UPDATE products SET name=:name,description=:description,category_id=:category_id,quantity=:quantity,price=:price WHERE id=:id");

        }else{
            $stmt = $db->prepare("UPDATE products SET name=:name,description=:description,category_id=:category_id,quantity=:quantity,price=:price,image=:image WHERE id=:id");
        }

        
        $stmt->execute($datas);

    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

function deleteproduct($id){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("DELETE FROM products WHERE id=:id");
        $stmt->execute([
            "id" => $id
        ]);

        echo "<script>window.location.href='../admin/index.php'</script>";


    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

?>