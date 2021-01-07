<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');

$promoCode = new Promocode($conn);
//get posted data
$data = json_decode(file_get_contents("php://input"));
  
// echo $data->validity;


if(
    !empty($data->promocode) &&
    !empty($data->cordRadius) &&
    !empty($data->promoDesc) &&
    !empty($data->originCords) &&
    !empty($data->destCords)&&
    !empty($data->number_of_rides)&&
    !empty($data->validity)&&
    !empty($data->status)
  
){
  
    // set promocode property values
    $promoCode->promocode = $data->promocode;
    $promoCode->promoDesc = $data->promoDesc;
    $promoCode->cordRadius = $data->cordRadius;
    $promoCode->originCords = $data->originCords;
    $promoCode->destCords = $data->destCords;
    $promoCode->numberofRides = $data->number_of_rides;
    $promoCode->validity = $data->validity;
    $promoCode->promostatus = $data->status;
  //$promoCode->promostatus;
//    echo $promocode->validity;
    // create the promocode
    if($promoCode->create()){
  
        // set response code - 201 created
        http_response_code(201);
      
        // tell the user
        echo json_encode(array("message" => "Promo code was created."));
    }
    // if unable to create the promocode, tell the user
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create Promocode."));
    }
}else{

    echo json_encode(array("message" => "incomplete promocode details inputted"));

}

?>