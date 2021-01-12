<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;
$act_code = isset($_GET['promocode'])? $_GET['promocode'] : $msg;
$strip_code = htmlspecialchars(strip_tags($act_code));
$promoCode = new Promocode($conn);
// echo "hi ";
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
