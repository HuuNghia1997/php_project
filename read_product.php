<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once './connection.php';
include_once './products.php';
$database = new Database();
$db = $database->getConnection();
$size = isset($_GET['size']) ? $_GET['size'] : 10;
$page = isset($_GET['page']) ?  $_GET['page'] : 0;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
$items = new Product($db, $size, $page, $keyword);
$results  = $items->getProducts();
$itemCount = $results[0];
$records = $results[1];
if ($itemCount > 0) {
    $billsArr = array();
    $billsArr["body"] = array();
    $billsArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc()) {
        array_push($billsArr["body"], $row);
    }
    echo json_encode($billsArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
