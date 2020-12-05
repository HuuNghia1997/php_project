<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './connection.php';
include_once './custommer.php';

$database = new Database();
$db = $database->getConnection();
$item = new Custommer($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->HoTen = $_GET['HoTen'];
if($item->updateCustommer()){
    echo json_encode(
        array("message" => "Cập nhật thành công")
    );
} else{
    echo json_encode(
        array("message" => "Cập nhật không thành công")
    );
}
?>