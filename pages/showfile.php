<!doctype html>
<html>
<head>
<title>URL File</title>
<LINK REL="SHORTCUT ICON" HREF="logo.png">
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script>
			$(document).ready(function(){	
				$(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});	
				
			});
                        
      

		</script>
</head>



<style>
 #object-container { position:relative; height:0; padding-bottom:100%;}
 #object-container object { width: 720px; height: 450px; position: absolute; left: 50%; margin-right: -50%; transform: translate(-50%, 0)}
 </style>
 
 
 
<style type="text/css">   
#printable { display: block; }  
@media print   
{   
     #non-printable { display: none; }   
    
}   
  @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>


<body>
  
        
   <div id="non-printable"> 
  <?php

include "../config/config.php";


$id_auto = $_GET['id_auto'];
$strSQL = "SELECT * FROM  file where id_auto='$id_auto'";
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
$num_rows = mysqli_num_rows($objQuery);
if($num_rows > 0){
?>
  
  <?php
   $objresult = mysqli_fetch_array($objQuery);  
   $objresult1 ="../doucment/".$objresult['file'];
    ?>
       <iframe id="count1"  src="../pdfjs/web/viewer.html?file=<?php echo $objresult1; ?>" width="100%" height="900px"></iframe>
     
 <?php 
}else{
    echo "<script language=\"JavaScript\">";
    echo "alert('ไม่พบข้อมูล');window.location='index.php';";
    echo "</script>";
	 
	 } 	
 ?>

   </div>  
 <?php
mysqli_close($conn);	
?>
<script type="text/javascript">
$(document).on("contextmenu", function(e) {
  console.log("right click disabled");
  return false;
});
</script>
</body>

</html>