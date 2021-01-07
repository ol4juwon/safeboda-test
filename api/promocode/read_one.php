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

// $promoCode->promocode = isset($_GET['pcode']) ? $_GET['pcode']: $msg="dead";
$pcode = isset($_GET['pcode']) ? $_GET['pcode']: $msg="dead";
$stmt = $promoCode->readOne($pcode);
$result = $conn->query($stmt);

echo $pcode;
if($result->num_rows>0){
    echo " promocode: ".$promoCode->promocode." is  q\n";

    $row = $result->fetch_assoc();
    extract($row);
    // create array
    $promocode_arr = array(
        "id" => $id,
        "promocode_Desc" => $promocode_desc,
        "promocode" => $promocode,
        "promo_rad" => $promo_rad,
        "ride_origin_geocode" => $ride_origin_geocode,
        "ride_dest_geocode" => $ride_dest_geocode,
        "number_rides" => $number_rides,
        "Active" => $Active,
        "validity" => $validity
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