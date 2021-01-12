<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');




$promoCode = new Promocode($conn);


$stmt = $promoCode->activeCodes();

$result = $conn->query($stmt);


if($result->num_rows > 0 ){


    $promocode = array();
    $promocode["records"] = array();
    while($row = $result->fetch_assoc()){

        extract($row);

        $promoCode_item = array(
            "id" => $id,
            "promocode_Desc" => $promocode_desc,
            "promocode" => $promocode,
            "promo_rad" => $cordRad,
            "ride_origin_geocode" => $eventLat,
            "ride_dest_geocode" => $eventLong,
            "number_rides" => $number_rides,
            "Active" => $active,
            "validity" => $valid_thru,
            "amount" => $amount
        );
        array_push($promocode['records'],$promoCode_item);
    }
    http_response_code(200);

    echo json_encode($promocode);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No active promocodes found.")
    );
}

?>
