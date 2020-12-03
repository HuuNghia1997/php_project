<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './connection.php';
include_once './donhang.php';
$database = new Database();
$db = $database->getConnection();
$size = null;
$page = null;
$items = new Bills($db,$size,$page);
$item->TongTien = $_GET['TongTien'];
$item->NgayDat = date('Y-m-d H:i:s');
$item->TrangThai = $_GET['TrangThai'];
$item->NhanVien_id = $_GET['NhanVien_id'];
$item->KhuyenMai_id = $_GET['KhuyenMai_id'];
$item->KhachHang_id = $_GET['KhachHang_id'];
if($item->createBills()){
echo 'Employee created successfully.';
} else{
echo 'Employee could not be created.';
}
?>