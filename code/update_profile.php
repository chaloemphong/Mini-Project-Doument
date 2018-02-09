
<?php	
   include '../config/config.php';
    
 $user_id = $_POST["user_id"];
 $Nickname = $_POST["Nickname"];
 $uername = $_POST["Username"];
 $password = $_POST["password"];
 $confirm = $_POST["confirm"];
 
 
 
 
 
 
 if ($password === $confirm ) {
   // success!
      //*** Update Record ***//
		$strSQL1 = "UPDATE member ";
		$strSQL1 .=" SET  Name ='".$Nickname."',Username='".$uername."',Password='".$password."' WHERE UserID = '".$user_id."' ";
		$objQuery1 = mysqli_query($conn,$strSQL1);
                

	if($objQuery1){
	echo "<script type='text/javascript'>";
	echo "alert('อัพเดทข้อมูลเรียบร้อยแล้ว');";
	echo "window.location = '../index.php?page=settings'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดข้อผิดพลาดกรุณาตรวจสอบข้อมูล');";
        echo "window.location = '../index.php?page=settings'; ";
	echo "</script>";
        }
     
}
else {
   // failed :(
        echo "<script type='text/javascript'>";
        echo "alert('กรุณายืนยันPasswordให้ตรงกัน');";
        echo "window.history.go(-1); ";
	echo "</script>";
}
 

  mysqli_close($conn);
?>

