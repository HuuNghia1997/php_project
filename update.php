<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './connection.php';
include_once './donhang.php';

$database = new Database();
$db = $database->getConnection();
$size = null;
$page = null;
$keyword = null;
$item = new Bills($db,$size,$page,$keyword);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->TongTien = $_GET['TongTien'];
$item->NgayDat = date('Y-m-d');
$item->TrangThai = $_GET['TrangThai'];
$item->KhuyenMai_id = $_GET['KhuyenMai_id'];
$item->NhanVien_id = $_GET['NhanVien_id'];
$item->KhachHang_id = $_GET['KhachHang_id'];
$item->TenKhachHang = $_GET['TenKhachHang'];
if($item->updateBills()){
    echo json_encode(
        array("message" => "Cập nhật đơn hàng thành công")
    );
} else{
    echo json_encode(
        array("message" => "Cập nhật đơn hàng không thành công")
    );
}
?>