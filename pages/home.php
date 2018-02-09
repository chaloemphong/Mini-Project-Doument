    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-family: thaisanslite_r1; font-size: 30px;">
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li style="font-size: 16px; "><a href="index.php?page=home"><i class="fa fa-home" ></i>หน้าหลัก</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <?php
                //นับจำนวนแถวทั้งหมดของเอกสาร ในตาราง file
                $Sql  = "select * from  file ";
                $query = mysqli_query($conn,$Sql); 
                $row = mysqli_num_rows($query);
                ?>
               <h3><?php echo $row;  ?></h3>
              <p style="font-size: 20px;">เอกสารในระบบ</p>
            </div>
            <div class="icon">
             <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                 <?php
                 //นับจำนวนแถวที่อยู่ในตาราง department (จำนวนแผนก)
                $Sql2  = "select * from  department ";
                $query2 = mysqli_query($conn,$Sql2); 
                $row2 = mysqli_num_rows($query2);
                ?>
               <h3><?php echo $row2;  ?><sup style="font-size: 20px"></sup> </h3>

              <p style=" font-size: 20px;">หมวดหมู่เอกสาร</p>
            </div>
            <div class="icon">
             <i class="fa fa-sitemap"></i>
            </div>
            <a href="#" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">              
                 <?php
                 //นับจำนวนUser ทั้งหมด ในตาราง member
                $Sql3  = "select * from  member ";
                $query3 = mysqli_query($conn,$Sql3); 
                $row3 = mysqli_num_rows($query3);
                ?>
               <h3><?php echo $row3;  ?></h3>

              <p style=" font-size: 20px;">ผู้ใช้งานระบบ</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">เพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
   
      <!-- /.row -->
      <!-- Main row -->
         
   
      
       </div>
      
      
      
         
      
      
       <div class="row">
           
            <?php
            //แสดงข้อมูลในตาราง file
           $sqlselect = "SELECT * FROM  file order by id_auto DESC   limit 12 ";
           $result5 = mysqli_query($conn,$sqlselect) or die ("Error Query [".$sqlselect."]");
           ?>
           
             <div class="col-md-8">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">เอกสารล่าสุด</h3>
            </div>
                    
          
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed table-hover">
                <tr>
                  <th >#</th>
                  <th width="10%">วันที่</th>
                  <th>ชื่อเอกสาร</th>            
                  <th>แผนก</th>
                </tr>
                <?php
                $inum = 0;
            while ($resultnew = mysqli_fetch_array($result5)){  
                $inum ++;
                
                //รับค่า id เพื่อมาแสดงข้อมูล แผนก
                $sql4 = "select * from department where dep_id = '".$resultnew["dep_id"]."'";
                $query4 = mysqli_query($conn,$sql4);
                $row4 = mysqli_fetch_array($query4);    
                ?>
        
                <tr>                   
                  <td><span class="badge bg-red"><?php echo $inum."."; ?></span></td>
                  <td><?php echo  date("d-m-Y",strtotime($resultnew["date"])); ?></td>
                  <td><a href='#' onclick='javascript:window.open("pages/showfile.php?id_auto=<?php echo $resultnew["id_auto"]; ?>", "_blank", "scrollbars=1,resizable=1,height=750,width=1000");'><?php echo $resultnew["file_name"];  ?></a></td>
                  <td class="text-center"><?php echo $row4["dep_name"]; ?></td>
                </tr>
          <?php       
           } 
           ?>
              </table>
            </div>
          </div>
          </div> 
           
           
           
          <div class="col-md-4">
          <div class="box">
            <div class="box-header">             
              <h3 class="box-title">เอกสารฝ่ายต่างๆ</h3>
            </div>  
            <div class="box-body no-padding">
    
        <?php  
         
        
            $strSQL = "SELECT * FROM department ";
            $result = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
        ?>
          
           <table  class="table table-condensed  table-hover">
            
                <tr>           
                  <th class="text-center">แผนก</th>
                  <th class="text-center">จำนวนเอกสาร</th>              
                </tr>
                                 
               
             <?php
             $i = 0;
          while ($row = mysqli_fetch_array($result)){
             
         $sqlnum = "select * from  file where dep_id = '".$row["dep_id"]."'";
         $query3 = mysqli_query($conn,$sqlnum);
         $numrow = mysqli_num_rows($query3);
            
              $i++
         ?>        
                <tr>
                  <td class="text-center"><?php echo $row["dep_name"];  ?></td>
                  <td class="text-center">
                      <span class="pull-center-container ">            
                      <small class="label pull-center bg-green "> <?php echo $numrow;  ?></small>
                      </span>
                  </td>
                </tr>    
           <?php  
            }
            
            ?>
    
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
           
           
           
            
           
           
          
                </div>
      <?php
          mysqli_close($conn); 
      ?>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content --> 