<?php
session_start(); 
include './config/config.php';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

$username = $_POST["txtusername"];
$password = $_POST["txtpassword"];


if($username == "") {   
 
    
header("Location:login.php");
    


} else if($password == "") { 
    
header("Location:login.php");

} else {  
     


$check_log = mysqli_query($conn,"select * from member where Username ='$username' and Password ='$password' ");                           
$num = mysqli_num_rows($check_log);

if($num <=0) {                                                           


echo "<script language=\"JavaScript\">";
echo "alert('Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง');window.location='login.php';";
echo "</script>";


} else {
while ($data = mysqli_fetch_array($check_log) ) {

if($data["Status"]== "ADMIN"){                          
echo "Hi Welcome Back Admin<br />";             
$_SESSION["UserID"] = session_id(); 
$_SESSION["Username"] = $username;      
$_SESSION["status"] = "ADMIN";                      
echo "<meta http-equiv='refresh' content='1;URL=index.php?page=home'>";



}elseif($data["Status"] == "USER"){                            
$_SESSION["UserID"] = session_id(); 

$_SESSION["Username"] = $username;      
$_SESSION["status"] = "USER";
echo "<meta http-equiv='refresh' content='1;URL=index.php?page=home'>";
echo "กรุณารอสักครู่........";
}
}
}
}
?>