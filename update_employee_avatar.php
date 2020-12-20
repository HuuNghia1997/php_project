<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './connection.php';
include_once './employees.php';

$filePath = $_SERVER['REQUEST_URI'];
$filePath = explode("/", $filePath);

$database = new Database();
$db = $database->getConnection();
$item = new Employees($db);
$item->tmp_name = $_FILES['image']['tmp_name'];
$item->id = $filePath[count($filePath)-1];


$item->IMG = basename($_FILES['image']['name']);

if ($item->upload_avatar()) {
    echo json_encode(
        array("message" => "Cập nhật thành công")
    );
} else {
    echo json_encode(
        array("message" => "Cập nhật không thành công")
    );
}
?>