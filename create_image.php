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
$image_text = mysqli_real_escape_string($db, $_POST['Mon_id']);
$items->Mon_id = $image_text;
if ($items->createImage()) {
    echo json_encode(
        array("message" => "Tạo thành công")
    );
} else {
    echo json_encode(
        array("message" => "Tạo không thành công")
    );
}
