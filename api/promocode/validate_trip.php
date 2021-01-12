<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once('../config/database.php');
include_once('../objects/promocode.php');



// echo $db;


//$pcode = isset($_GET['pcode']) ? $_GET['pcode']: $msg="dead";

$promoCode = new Promocode($conn);
// query promo codes

$pcode = isset($_GET['pcode']) ? $_GET['pcode']: $msg="dead";
$dest = isset($_GET['dest']) ? $_GET['dest']: $msg="dest";
// echo $pcode.$dest;
$stmt = $promoCode->validate($pcode, $dest);

echo "ii";
 $result = $conn->query($stmt);
echo $stmt;
if($result->num_rows >0){


    $promoCode_arr = array();
    $promoCode_arr["records"] = array();
    while($row = $result->fetch_assoc()){

        extract($row);
        $promoCode_item = array(
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
       // echo $promoCode_item['id'];
        array_push($promoCode_arr['records'],$promoCode_item);
    }
    http_response_code(200);

    echo json_encode($promoCode_arr['records']);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No promocode found.")
    );
}

?>
