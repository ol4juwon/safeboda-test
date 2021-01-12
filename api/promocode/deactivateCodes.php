<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;
$act_code = isset($_GET['promocode'])? $_GET['promocode'] : $msg;

$promoCode = new Promocode($conn);
// query promo codes

$stmt = $promoCode->deactivateCode($act_code);

//$result = $conn->query($stmt); 
//echo "njm ".$result;
  
if($conn->query($stmt) == true ){


    $promoCode_arr = array();
    $promocode["records"] = array();
    echo " if try";
    echo $row = $result->fetch_assoc();

        extract($row);
    echo " e while try ";


        $promoCode_item = array(
            "id" => $id,
            "promocode_Desc" => $promoDesc,
            "promocode" => $promocode,
            "promo_rad" => $cordRadius,
            "ride_origin_geocode" => $originCords,
            "ride_dest_geocode" => $destCords,
            "number_rides" => $numberofRides,
            "Active" => $promostatus,
            "validity" => $validity
        );
        array_push($promoCode_arr['records'],$promoCode_item);
   
    echo "ment";
    http_response_code(200);

    echo "deactivated".json_encode($promoCode_arr);
    
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No promocode found.")
    );
}

?>
