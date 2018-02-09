

<section class="content-header">
      <h1 style="font-family: thaisanslite_r1; font-size: 26px;">
        <i class="fa fa-cog"></i>ตั้งค่าระบบ
      </h1>
      <ol class="breadcrumb">
         <li style="font-size: 16px; "><a href="index.php?page=home"><i class="fa fa-home"></i>หน้าหลัก</a></li>
        <li class="active" style="font-size: 16px; ">ตั้งค่าระบบ</li>
      </ol>
    </section>


<div class="modal fade" id="add_record" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มข้อมูล</h4>
              </div>
              <div class="modal-body">
               
                  <form method="post" action="code/add_dep.php">    
         
              
              <div class="form-group">
                  <label for="recipient-name"  class="form-control-label" >แผนก:</label>
            <input type="text" class="form-control" name="file_name" id="file_name" required>
          </div>
              

              <div class="modal-footer">
                <button type="submit"  class="btn btn-primary"><i class="fa fa-floppy-o"></i> บันทึกข้อมูล</button> 
              </div>
                    </form>     
                </div>
            </div>              
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




        
<!-- Main content -->
    <section class="content">
      <div class="row">
           <div class="col-md-4">
          <div class="box">
            <div class="box-header">             
               <div class="btn-group">
                     <button type="button" class="btn btn-info"   data-toggle="modal" data-target="#add_record"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูล</button>
                </div>
            </div>  
            <div class="box-body no-padding">
    
        <?php  
         
        
            $strSQL = "SELECT * FROM department ";
            $result = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
        ?>
          
           <table  class="table table-condensed  table-hover">
            
                <tr> 
                  <th class="text-center">รหัส</th>
                  <th class="text-center">หมวดหมู่</th>                              
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
                    <td class="text-center">           
                      <?php echo $row["dep_id"];  ?>               
                  </td>
                  <td class="text-center"><?php echo $row["dep_name"];  ?></td>            
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

