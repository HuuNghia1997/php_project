<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './connection.php';
include_once './employees.php';

$database = new Database();
$db = $database->getConnection();
$item = new Employees($db);

$taikhoan = isset($_POST['taikhoan']) ? $_POST['taikhoan'] : "";
$matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : "";
$hoten = isset($_POST['hoten']) ? $_POST['hoten'] : "";
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : "";
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : "";
$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : "";
$ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : date('Y-m-d');
$email = isset($_POST['email']) ? $_POST['email'] : "";

if($item->createEmployee($taikhoan,$matkhau,$hoten,$sdt,$diachi,$gioitinh,$ngaysinh,$email)){
    echo json_encode(
        array("message" => "Tạo người dùng thành công")
    );
} else{
    echo json_encode(
        array("message" => "Tạo người dùng không thành công")
    );
}
?>