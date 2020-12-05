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
$keyword = null;
$items = new Bills($db,$size,$page,$keyword);
$items->TongTien = $_GET['TongTien'];
$items->NgayDat = date('Y-m-d');
$items->TrangThai = $_GET['TrangThai'];
$items->KhuyenMai_id = $_GET['KhuyenMai_id'];
$items->NhanVien_id = $_GET['NhanVien_id'];
$items->KhachHang_id = $_GET['KhachHang_id'];
$items->TenKhachHang = $_GET['TenKhachHang'];
if($items->createBills()){
    echo json_encode(
        array("message" => "Tạo đơn hàng thành công")
    );
} else{
    echo json_encode(
        array("message" => "Tạo đơn hàng không thành công")
    );
}
