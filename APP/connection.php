<?php
   
   function OpenConn(){
      $dbhost = "localhost";
      $dbuser = "zuper";
      $dbpass = "RaBBitHole13!";
      $db = "ELIDEK_db";
      
      $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
      
      //echo "Connected successfully";
      return $conn;
   }
   
   function CloseCon($conn){
      $conn -> close();
   }  


?>