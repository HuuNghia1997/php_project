<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once './connection.php';
include_once './image_product.php';
$database = new Database();
$db = $database->getConnection();
$tmp_name = null;
$items = new imageProduct($db, $tmp_name);
$items->id = isset($_GET['HinhMon_id']) ? $_GET['HinhMon_id'] : die();
$records = $items->getOneImage();
$itemCount = $records->num_rows;
if ($itemCount > 0) {
    $billsArr = array();
    while ($row = $records->fetch_assoc()) {
        echo json_encode($row);
    }

} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
