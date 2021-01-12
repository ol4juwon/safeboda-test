<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;

$promoCode = new Promocode($conn);
$data = json_decode(file_get_contents("php://input"));
$pcode = $data->promocode;
$strip_code = htmlspecialchars(strip_tags($pcode));
 $activa = $promoCode->activateCode($strip_code);

    
if($activa->affected_rows >0){
    http_response_code(200);
    echo json_encode(
        array("message" => "Promocode Activated")
    );
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Promocode is already Active")
    );
}

?>
