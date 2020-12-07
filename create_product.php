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
$items = new Product($db,$size,$page,$keyword);
$items->TenMon = $_GET['TenMon'];
$items->MoTa = $_GET['MoTa'];
$items->Gia = $_GET['Gia'];
$items->LoaiMon_id = $_GET['LoaiMon_id'];
if($items->createProduct() !== false){
    echo json_encode(
        array("id" => $items->createProduct())
    );
} else{
    echo json_encode(
        array("message" => "Tạo không thành công")
    );
}
