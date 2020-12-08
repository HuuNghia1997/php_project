<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
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
$item->TenMon = $_GET['TenMon'];
$item->MoTa = $_GET['MoTa'];
$item->Gia = $_GET['Gia'];
$item->LoaiMon_id = $_GET['LoaiMon_id'];
if($item->updateProduct()){
    echo json_encode(
        array("message" => "Cập nhật thành công")
    );
} else{
    echo json_encode(
        array("message" => "Cập nhật không thành công")
    );
}
?>