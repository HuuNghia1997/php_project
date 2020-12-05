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
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$records = $item->getOneEmployee();
$itemCount = $records->num_rows;
if ($itemCount > 0) {
    while ($row = $records->fetch_assoc()) {
        $item->HoTen = $row['HoTen'];
        echo json_encode(
            array("HoTen" => $item->HoTen)
            );
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>