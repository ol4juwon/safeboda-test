<?php
class Events{

    private $conn;
    private $db_table = "events";
    
public $id;
public $event_name;
public $cordLat;
public $cordLong;
public $cordRadius;
public $event_date;

public function __construct($db){
    $this->conn = $db;
}

function read(){
$query = " SELECT * from ". $this->db_table. " ORDER BY name";
//echo $query;
 $stmt = $this->conn->prepare($query);
$stmt ->execute();

return $query;


}
}

?>