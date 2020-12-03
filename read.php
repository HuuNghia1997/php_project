<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once './connection.php';
include_once './donhang.php';
$database = new Database();
$db = $database->getConnection();
$size = $_GET['size'];
$page = $_GET['page'];
$items = new Bills($db,$size,$page);
// $item->size = $_GET['size'];
// $item->page = $_GET['page'];
$records = $items->getBills();
$itemCount = $records->num_rows;
if($itemCount > 0){
$billsArr = array();
$billsArr["body"] = array();
$billsArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($billsArr["body"], $row);
}
echo json_encode($billsArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>