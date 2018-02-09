
<?php
   include '../config/config.php';
   session_start();
 date_default_timezone_set("Asia/Bangkok");
 $date = date("Y-m-d");

 $id_auto = $_POST["id_auto"];
 $f_id = $_POST["f_id"];
 $file_name = $_POST["file_name"];
 $dep_id = $_POST["dep_id"];
 $file_old = $_POST["file_old"];

               //*** Update Record ***//
		$strSQL1 = "UPDATE file ";
		$strSQL1 .=" SET  f_id ='".$f_id."',file_name='".$file_name."',dep_id='".$dep_id."' , history_edit='".$_SESSION["Username"]."'  WHERE id_auto = '".$id_auto."' ";
		$objQuery1 = mysqli_query($conn,$strSQL1);

	        if($objQuery1){

           if(move_uploaded_file($_FILES["new_file"]["tmp_name"],"../pdfjs/doucment/".$_FILES["new_file"]["name"]))
	   {

				//*** Delete Old File ***//
				@unlink("../pdfjs/doucment/".$file_old);

				//*** Update New File ***//
				$strSQL = "UPDATE file ";
				$strSQL .=" SET file = '".$_FILES["new_file"]["name"]."' , date_update='".$date."' ,  history_edit='".$_SESSION["Username"]."'  WHERE id_auto = '".$id_auto."' ";
				$objQuery = mysqli_query($conn,$strSQL);


	if($objQuery){
	echo "<script type='text/javascript'>";
	echo "alert('อัพเดทข้อมูลเรียบร้อยแล้ว');";
	echo "window.location = '../index.php?page=data'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดข้อผิดพลาดกรุณาตรวจสอบข้อมูล');";
        echo "window.location = '../index.php?page=data'; ";
	echo "</script>";
}


}

	        echo "<script type='text/javascript'>";
	        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
	        echo "window.location = '../index.php?page=data';";
	        echo "</script>";
 } else {

       echo "<script type='text/javascript'>";
	echo "alert('เกิดข้อผิดพลาดกรุณาตรวจสอบข้อมูล');";
	echo "window.location = '../index.php?page=data';";
	 echo "</script>";


}














		mysqli_close($conn);
?>
