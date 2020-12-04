<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './connection.php';
include_once './employee.php';
$database = new Database();
$db = $database->getConnection();
$items = new \Users($db);
$items->TaiKhoan = isset($_GET['TaiKhoan']) ? $_GET['TaiKhoan'] : "null";
$items->PassWord = isset($_GET['PassWord']) ? $_GET['PassWord'] : "null";
if($items->login()){
    http_response_code(200);
    echo json_encode(
        array("message" => "Đăng nhập thành công")
    );
    } else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Đăng nhập thất bại")
        );
    }

?>