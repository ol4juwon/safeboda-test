<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;


$promoCode = new Promocode($conn);
// query promo codes

$stmt = $promoCode->activeCodes();

$result = $conn->query($stmt);


if($result->num_rows > 0 ){


    $promoCode_arr = array();
    $promocode["records"] = array();
    while($row = $result->fetch_assoc()){

        extract($row);

        $promoCode_item = array(
            "id" => $id,
            "promocode_Desc" => $promoDesc,
            "promocode" => $promocode,
            "promo_rad" => $cordRadius,
            "ride_origin_geocode" => $originCords,
            "ride_dest_geocode" => $destCords,
            "number_rides" => $numberofRides,
            "Active" => $promostatus,
            "validity" => $validity,
            "amount" => $amount
        );
        array_push($promoCode_arr['records'],$promoCode_item);
    }
    http_response_code(200);

    echo json_encode($promoCode_arr);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No active promocodes found.")
    );
}

?>
