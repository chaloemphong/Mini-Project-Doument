<?php
error_reporting(0);
	 // include Database connection file 
		include("../config/config.php");

		// get values 
		$file_name = $_POST['file_name'];

		$query = "INSERT INTO department (dep_name) VALUES('".$file_name."')";
                $result1 = mysqli_query($conn,$query);
                $result = mysqli_fetch_array($result1);
		if($result){
                    
                    echo "<script type='text/javascript'>";
                    echo "alert('เกิดข้อข้อมูลผิดพลาดกรุณาตรวจสอบข้อมูลอีกครั้ง');";
                    echo "window.location='../index.php?page=site_dep';";   
                    echo "</script>";
                    
	        
                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
                    echo "window.location='../index.php?page=site_dep';";   
                    echo "</script>";
                }
       
?>