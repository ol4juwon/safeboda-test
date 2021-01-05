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
$stmt ->execute();

return $query;


}



}

?>
