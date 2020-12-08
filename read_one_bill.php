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
$item = new Bills($db,$size,$page,$keyword);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$records = $item->getOneBill();
$itemCount = $records->num_rows;
if ($itemCount > 0) {
    $billsArr = array();
    $billsArr["body"] = array();
    $billsArr["itemCount"] = $itemCount;
    $billDetail;
    while ($row = $records->fetch_assoc()) {
        array_push($billsArr, $row);
        $billDetail = $row;
    }
    echo json_encode($billDetail);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>