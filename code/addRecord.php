<?php
error_reporting(0);
session_start();
	if(isset($_POST['f_id']) && isset($_POST['file_name']) && isset($_POST['dep_id']))
	{

	 // include Database connection file
		include("../config/config.php");


		$sqlselect = "select * from member where Username = '".$_SESSION["Username"]."'   ";
		$sqlq = mysqli_query($conn,$sqlselect);
		$result5  = mysqli_fetch_array($sqlq);



		// get values
		$f_id = $_POST['f_id'];
		$file_name = $_POST['file_name'];
		$dep_id= $_POST['dep_id'];
                $filUpload = $_POST["filUpload"];
                $date = date("Y-m-d");



                 if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../pdfjs/doucment/".$_FILES["filUpload"]["name"]))
	{
		$query = "INSERT INTO file(f_id,file_name,dep_id,file,date,history_add) VALUES('".$f_id."','".$file_name."','".$dep_id."','".$_FILES["filUpload"]["name"]."','".$date."','".$result5["Name"]."')";
                $result1 = mysqli_query($conn,$query);
                $result = mysqli_fetch_array($result1);
		if($result){

                    echo "<script type='text/javascript'>";
                    echo "alert('เกิดข้อข้อมูลผิดพลาดกรุณาตรวจสอบข้อมูลอีกครั้ง');";
                    echo "window.location='index.php?page=data';";
                    echo "</script>";


                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
                    echo "window.location='../index.php?page=data';";
                    echo "</script>";
                }
        }
	}else{




        }
?>
