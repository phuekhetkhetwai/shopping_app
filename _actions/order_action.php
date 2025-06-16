<?php
require_once "../config/config.php";

function allorders(){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT sale_orders.*, users.name 
        FROM sale_orders 
        LEFT JOIN users ON sale_orders.user_id = users.id");
        $stmt->execute();
        $datas = $stmt->fetchall();

        return $datas;

    }catch(PDOException $e){
        echo "Error found ". $e->getMessage();
    }

}

function getorder($id){

    try{

        $db = $GLOBALS["db"];

        $stmt = $db->prepare("SELECT sale_order_details.*, products.name 
                FROM sale_order_details 
                LEFT JOIN products ON sale_order_details.product_id = products.id 
                WHERE sale_order_details.sale_order_id = :id");
        $stmt->execute([
            "id" => $id
        ]);
        $data = $stmt->fetch();

        return $data;

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