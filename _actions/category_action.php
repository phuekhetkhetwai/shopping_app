<?php
require_once "../config/config.php";

function allcategories(){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT * FROM categories");
        $stmt->execute();
        $datas = $stmt->fetchall();

        return $datas;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function getcategory($id){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT * FROM categories WHERE id=:id");
        $stmt->execute([
            "id" => $id
        ]);
        $data = $stmt->fetch();

        return $data;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function addcategory($datas){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("INSERT INTO categories(name,description) VALUE (:name,:description)");
        $stmt->execute($datas);

        echo "<script>alert('Successfully Created.');window.location.href='../admin/category.php'</script>";


    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

function updatecategory($datas){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("UPDATE categories SET name=:name,description=:description WHERE id=:id");
        $stmt->execute($datas);

        echo "<script>alert('Successfully Updated.');window.location.href='../admin/category.php'</script>";


    }catch(PDOException $e){

        echo "Error found ". $e->getMessage();

    }
}

function deletecategory($id){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("DELETE FROM categories WHERE id=:id");
        $stmt->execute([
            "id" => $id
        ]);

        echo "<script>window.location.href='../admin/category.php'</script>";


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