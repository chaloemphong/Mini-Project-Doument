<section class="content-header">
    <h1 style="font-family: thaisanslite_r1; font-size: 26px;">แก้ไขข้อมูล</h1>
      <ol class="breadcrumb">
         <li style="font-size: 16px; "><a href="index.php?page=home"><i class="fa fa-home"></i>หน้าหลัก</a></li>
         <li  style="font-size: 16px; "><a href="index.php?page=data">ข้อมูลเอกสาร</a></li>
         <li class="active" style="font-size: 16px; ">แก้ไขข้อมูล</li>      
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
     
     $sql = "select * from file where id_auto='".$_GET["id_auto"]."'";
     $sqlquery = mysqli_query($conn,$sql);
     $result =  mysqli_fetch_array($sqlquery);
     ?>
                
                
      <form name="frm_update"  action="code/update_data.php"  enctype="multipart/form-data" method="post" >
       
     <input  type="hidden" name="id_auto" value="<?php echo $result["id_auto"];  ?>">
     <input type="hidden" name="file_old" value="<?php echo $result["file"];  ?>">
        
   <div class="form-group">
       <label>สร้างเมื่อ : <?php echo  date('d-m-Y',strtotime($result["date"])) ; ?></label>
  </div>     
       
  <div class="form-group">
    <label>รหัสเอกสาร : </label>
    <input type="text" name="f_id" class="form-control" value="<?php echo $result["f_id"]; ?>">
  </div>
       
  <div class="form-group">
    <label>ชื่อเอกสาร : </label>
    <input type="text" name="file_name" class="form-control" value="<?php echo $result["file_name"]; ?>">
  </div>  
     
     <div class="form-group">
    <label>แก้ไขเอกสารล่าสุด : </label>
    <input type=time"  class="form-control" value="<?php echo $result["date"]; ?>">
  </div>  
    
   <div class="form-group">
    <label for="recipient-name"  class="form-control-label">แผนก:</label>
            <?php 
            //แสดง รายการ แผนกใน select input (ข้อมูลเดิม)
            $sqledep = "select * from department where dep_id = '".$result["dep_id"]."'";
            $querydep = mysqli_query($conn,$sqledep);          
            ?>
           <select name="dep_id"  class="selectpicker form-control" required>              
            <?php while ($rowdep = mysqli_fetch_array($querydep)) { ?>
                 <option  value="<?php echo $rowdep["dep_id"]; ?>" ><?php echo $rowdep["dep_name"]; ?></option>
             <?php  } ?>
                 
                  <?php 
            //แสดง รายการ (ข้อมูลใหม่)
            $sqledep2 = "select * from department where dep_id != '".$result["dep_id"]."'";
            $querydep2 = mysqli_query($conn,$sqledep2);  
           while ($rowdep2 = mysqli_fetch_array($querydep2)) { 
            ?>
                 <option value="<?php echo $rowdep2["dep_id"]; ?>" ><?php echo $rowdep2["dep_name"]; ?></option>
             
        <?php  } ?>   
            </select>
               </div>
    
     
  <div class="form-group">
    <label>File : </label>
    <input type="file" class="form-control" name="new_file">
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

