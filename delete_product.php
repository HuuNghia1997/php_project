<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './connection.php';
include_once './products.php';
$database = new Database();
$db = $database->getConnection();
$size = null;
$page = null;
$keyword = null;
$item = new Product($db,$size,$page,$keyword);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
if($item->deleteProduct()){
    echo json_encode(
        array("message" => "Xóa thành công")
    );
} else{
    echo json_encode(
        array("message" => "Xóa không thành công")
    );
}
