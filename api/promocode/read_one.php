<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once('../config/database.php');
include_once('../objects/promocode.php');

$promoCode = new Promocode($conn);
//echo $_GET['pcode'];
$data = json_decode(file_get_contents("php://input"));
// $promoCode->promocode = isset($_GET['pcode']) ? $_GET['pcode']: $msg="dead";
$pcode = $data->promocode;
$strip_code = htmlspecialchars(strip_tags($pcode));
$stmt = $promoCode->readOne($strip_code);
$result = $conn->query($stmt);

if($result->num_rows>0){

    $row = $result->fetch_assoc();
    extract($row);
    // create array
    $promocode_arr = array(
        "id" => $id,
        "Promocode Description/ Event Name" => $promocode_desc,
        "Promo Code" => $promocode,
        "Event Radius" => $cordRad,
        "Event Latitude" => $eventLat,
        "Event Longitude" => $eventLong,
        "number of rides" => $number_rides,
        "Active status " => $Active,
        "validity" => $valid_thru,
        "Amount " => $amount
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
   echo  json_encode($promocode_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "Product does not exist."));
}

?>