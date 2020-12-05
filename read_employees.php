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
$records = $item->getEmployees();
$itemCount = $records->num_rows;
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
?>