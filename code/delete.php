<?php
include '../config/config.php';


//ลบไฟล์ใน  Folder
$sql= "select * from file where  id_auto ='".$_GET["id_auto"]."' ";
$q = mysqli_query($conn,$sql);
$res = mysqli_fetch_array($q);
$file = $res["file"];
$dele = mysqli_query($conn,"delete from file where id_auto ='".$_GET["id_auto"]."'");
if(!$dele){
	echo mysqli_error();
	
}

else{
	@unlink("../pdfjs/doucment/".$file);
    }	



$sqldete= "delete from file where id_auto ='".@$_GET["id_auto"]."' ";
$queryresult = mysqli_query($conn,$sqldete);
$result = mysqli_fetch_array($queryresult);


$dele_sc = $_GET["id_auto"];
if($result){
    
    echo "<script type='text/javascript'>";
    echo "alert('ไม่สามารถลบข้อมูลได้');";
    echo "window.location='../index.php?page=data';";   
    echo "</script>";
    
}else{
        
    echo "<script type='text/javascript'>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='../index.php?page=data';";
    echo "</script>";
    
}


?>