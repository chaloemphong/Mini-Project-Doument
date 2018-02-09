<section class="content-header">
    <h1 style="font-family: thaisanslite_r1; font-size: 26px;">ตั้งค่าผู้ใช้งาน</h1>
      <ol class="breadcrumb">
         <li style="font-size: 16px; "><a href="index.php?page=home"><i class="fa fa-home"></i>หน้าหลัก</a></li>
         <li class="active" style="font-size: 16px; ">ตั้งค่าผู้ใช้งาน</li>      
      </ol>
    </section>


<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
     <?php
     
     $sql = "select * from member where   Username='".$_SESSION["Username"]."' ";
     $sqlquery = mysqli_query($conn,$sql);
     $result =  mysqli_fetch_array($sqlquery);
     ?>
                               
                <form name="frm_update"  action="code/update_profile.php"  method="post" >
     <input type="hidden" name="user_id" class="form-control" value="<?php echo $result["UserID"] ; ?>">   
     
     
      <div class="form-group">
    <label>Nickname  </label>
    <input type="text" name="Nickname" class="form-control" value="<?php echo $result["Name"] ; ?>">
  </div>
     
     
  <div class="form-group">
    <label>Username </label>
    <input type="text" name="Username" class="form-control" value="<?php echo $result["Username"] ; ?>">
  </div>
       
  <div class="form-group">
    <label>Password </label>
    <input type="password" name="password" class="form-control" value="<?php echo $result["Password"]; ?>">
  </div>  
     
     <div class="form-group">
    <label>confirm </label>
    <input type=password" name="confirm" class="form-control">
  </div>  
              
       <br>
        <div class="form-group">
        <button type="submit" class="btn btn-success"><i class="fa fa-external-link"></i> บันทึก</button>  
       </div> 
       
</form>            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

