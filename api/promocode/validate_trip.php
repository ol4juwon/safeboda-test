<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;


//$pcode = isset($_GET['pcode']) ? $_GET['pcode']: $msg="dead";

$promoCode = new Promocode($conn);
// query promo codes
$data = json_decode(file_get_contents("php://input"));

$pcode = $data->promocode;
$long = $data->eventLong;
$lat = $data->eventLat;

$strip_pcode = htmlspecialchars(strip_tags($pcode));
$strip_long = htmlspecialchars(strip_tags($long));
$strip_lat = htmlspecialchars(strip_tags($lat));

$stmt = $promoCode->validate($strip_pcode, $strip_long,$strip_lat);


 $result = $conn->query($stmt);

if($result->num_rows >0){


    $promoCode_arr = array();
    $promoCode_arr["records"] = array();
    while($row = $result->fetch_assoc()){

        extract($row);
        $promoCode_item = array(
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
        array_push($promoCode_arr['records'],$promoCode_item);
    }
    http_response_code(200);

    echo json_encode($promoCode_arr['records']);
    echo json_encode(
        array("message" => "promocode valid for trip")
    );
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "promocode invalid for trip")
    );
}

?>
