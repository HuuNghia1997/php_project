<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './connection.php';
include_once './image_product.php';
$database = new Database();
$db = $database->getConnection();
$tmp_name = $_FILES['image']['tmp_name'];
$items = new imageProduct($db, $tmp_name);
$items->IMG = basename($_FILES['image']['name']);
$image_id = mysqli_real_escape_string($db, $_POST['HinhMon_id']);
$items->id = $image_id;
if ($items->updateImage()) {
    echo json_encode(
        array("message" => "Cập nhật thành công")
    );
} else {
    echo json_encode(
        array("message" => "Cập nhật không thành công")
    );
}
