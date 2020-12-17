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
$item->id = $filePath[count($filePath)-1];

$hoten = isset($_POST['hoten']) ? $_POST['hoten'] : "";
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : "";
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : "";
$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : "";
$ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : date('Y-m-d');
$email = isset($_POST['email']) ? $_POST['email'] : "";

if($item->updateEmployees($hoten,$sdt,$diachi,$gioitinh,$ngaysinh,$email)){
    echo json_encode(
        array("message" => "Cập nhật thành công")
    );
} else{
    echo json_encode(
        array("message" => "Cập nhật không thành công")
    );
}
?>