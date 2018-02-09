<?php
  ini_set('display_error',1);
  error_reporting(~0);

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_document";
    
 $conn = mysqli_connect($host,$user,$pass); 
 $conndb = mysqli_select_db($conn,$database);
 mysqli_set_charset($conn, "utf8");

 if(mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
?>
