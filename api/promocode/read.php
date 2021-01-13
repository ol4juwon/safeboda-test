<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;


$promoCode = new Promocode($conn);
// query promo codes

$stmt = $promoCode->read();

$result = $conn->query($stmt);


if($result->num_rows > 0 ){
   


    $promoCode_arr = array();
    $promoCode_arr["records"] = array();
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
        array_push($promoCode_arr['records'],$promoCode_item);
    }
    http_response_code(200);

    echo json_encode($promoCode_arr);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No promocode found.")
    );
}

?>
