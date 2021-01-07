<?php
     $db_host = "localhost";
   $db_name = "safeboda_api";
     $user = "root";
     $pword = "root";
       $conn;
   
 
    $conn = new mysqli(
        $db_host,
        $user,
        $pword,
        $db_name
      );
   
     if($conn ->connect_error){
         echo "Connecting to database failed";
         echo $conn->connect_errno;
         echo $conn->connect_error;
         exit();
   
     }else{
       echo "connection success \n ";
     }

    




?>