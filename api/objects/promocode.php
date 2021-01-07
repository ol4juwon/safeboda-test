<?php
class Promocode{
private $conn;
private $db_table = "promocodes";

//promocode properties


public $id;
public $promoDesc;
public $promocode;
public $numberofRides;
public $validity;
public $originCords;
public $destCords;
public $cordRadius;
public $promostatus;

public function __construct($db){
    $this->conn = $db;
}

function read(){
$query = " SELECT * from ". $this->db_table. " ORDER BY validity";
//echo $query;
 $stmt = $this->conn->prepare($query);
if($stmt ->execute()){

return $query;
}

}

function create(){
    
$this->promocode = htmlspecialchars(strip_tags($this->promocode));
$this->promoDesc = htmlspecialchars(strip_tags($this->promoDesc));
$this->numberofRides = htmlspecialchars(strip_tags($this->numberofRides));
$this->validity = htmlspecialchars(strip_tags($this->validity));
$this->promostatus = htmlspecialchars(strip_tags($this->promostatus));
$this->originCords = htmlspecialchars(strip_tags($this->originCords));
$this->destCords = htmlspecialchars(strip_tags($this->destCords));
$this->cordRadius = htmlspecialchars(strip_tags($this->cordRadius));
$query = "INSERT INTO ".$this->db_table."  (promocode_desc,promocode,number_rides,Active,validity,promo_rad,ride_origin_geocode,ride_dest_geocode)
   VALUES('". $this->promoDesc."','".$this->promocode."','".$this->numberofRides."',' ".$this->validity."' ,'".$this->promostatus."','".$this->cordRadius ."','".$this->originCords ."','".$this->destCords."')";
    

// echo $stmt." 1";
$stmt = $this->conn->prepare($query);
// $stmt->bindParam(":promoDesc",$this->promoDesc);

// $stmt->bindParam(":promocode",$this->promocode);
// $stmt->bindParam(":numberofRides",$this->numberofRides);
// $stmt->bindParam(":promostatus",$this->promostatus);
// $stmt->bindParam(":originCords",$this->originCords);
// $stmt->bindParam(":destCords",$this->destCords);
// $stmt->bindParam(":validity",$this->validity);
// $stmt->bindParam(":cordRadius",$this->cordRadius);
// echo $stmt;
//echo $query;
if($stmt->execute()){
return true;
}

return false;






}

function readOne($pcode){
    $query = "SELECT * from ".$this->db_table." WHERE promocode = '".$pcode."'LIMIT 0,1 ";

    $stmt = $this->conn->prepare( $query );

  
    // execute query
    if($stmt->execute()){



  return $query;
}




}
}
?>
