<section class="content-header">
      <h1 style="font-family: thaisanslite_r1; font-size: 26px;">
        ข้อมูลเอกสารทั้งหมด
      </h1>
      <ol class="breadcrumb">
          <li><a href="index.php?page=home" style="font-size: 16px; "><i class="fa fa-home"></i>หน้าหลัก</a></li>
        <li class="active" style="font-size: 16px; ">ข้อมูลเอกสาร</li>
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

                  <form method="post" action="code/addRecord.php" enctype="multipart/form-data">
          <div class="form-group">
              <label for="recipient-name"  class="form-control-label">รหัสเอกสาร:</label>
            <input type="text" class="form-control" name="f_id" id="f_id" required>
          </div>

              <div class="form-group">
                  <label for="recipient-name"  class="form-control-label" >ชื่อเอกสาร:</label>
            <input type="text" class="form-control" name="file_name" id="file_name" required>
          </div>

               <div class="form-group">
                   <label for="recipient-name"  class="form-control-label">แผนก:</label>
            <?php
            //แสดง รายการ แผนกใน select input
            $sql = "select * from department";
            $query = mysqli_query($conn,$sql);

            ?>
           <select name="dep_id" id="dep_id" class="selectpicker form-control" required>
                 <option value="" >กรุณาเลือกแผนก</option>
            <?php while ($row = mysqli_fetch_array($query)) { ?>
                <option value="<?php echo $row["dep_id"]; ?>" ><?php echo $row["dep_name"]; ?></option>
             <?php  } ?>
            </select>
               </div>

          <div class="form-group">
           <label for="recipient-name"  class="form-control-label" >ไฟล์เอกสาร:</label>
           <input type="file" class="form-control" name="filUpload" id="filUpload" required>
          </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-remove"></i>ยกเลิก</button>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <div class="btn-group">
                     <button type="button" class="btn btn-success"   data-toggle="modal" data-target="#add_record"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูล</button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


        <?php
          //ดึงข้อมูลจากตาราง file เพื่อมาแสดงบนตาราง
            $strSQL = "SELECT * FROM file order by date DESC";
            $result = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
        ?>
                <div class="table-responsive">
           <table id="example1" class="table table-bordered  table-hover">
                <thead>
                <tr>
                  <th width="15%" class="text-center">รหัสเอกสาร</th>
                  <th width="10%" class="text-center">วันที่</th>
                  <th width="40%" class="text-center">ชื่อเอกสาร</th>
                  <th class="text-center">ไฟล์</th>
                  <th width="7%" class="text-center">แก้ไขล่าสุด</th>
                  <th class="text-center">แผนก</th>
                  <th width="15%" class="text-center">จัดการ</th>
                </tr>
                </thead>
               <tbody>
             <?php
             $i = 0;
          while ($row = mysqli_fetch_array($result)){

              //รับค่าและแสดง รายชื่อแต่ล่ะ แผนก
              $sql4 = "select * from department where dep_id = '".$row["dep_id"]."'";
                $query4 = mysqli_query($conn,$sql4);
                $row4 = mysqli_fetch_array($query4);
              $i++
         ?>
                <tr>

                  <td ><?php echo $row["f_id"];  ?></td>
                   <td class="text-center"><?php echo date("d-m-Y",strtotime($row["date"])); ?></td>
                   <td><?php echo $row["file_name"];  ?></td>
                   <td><?php echo $row["file"];  ?></td>
                   <td class="text-center"><?php  if($row["date_update"] == 0){ echo "";  }else{  echo  date('d-m-Y',strtotime($row["date_update"]));  }   ?></td>
                   <td class="text-center"><?php echo $row4["dep_name"]; ?></td>

                   <td class="text-center">
                      
                       <a href='#' onclick='javascript:window.open("pages/download.php?pic=../pdfjs/doucment/<?php echo $row["file"]; ?>");'><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-download" aria-hidden="true"></i></button></a>

                        <a href='#' onclick='javascript:window.open("pages/showfile.php?id_auto=<?php echo $row["id_auto"]; ?>", "_blank", "scrollbars=1,resizable=1,height=750,width=1000");'><button type="button" class="btn btn-success  btn-xs"><i class="fa  fa-mail-forward"></i></button></a>

                        <a href="index.php?page=edit_data&id_auto=<?php echo $row["id_auto"]; ?>"><button type="button" class="btn btn-primary  btn-xs"><i class="fa fa-edit"></i></button></a>

                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูลหรือไม่ ?')==true){window.location='code/delete.php?id_auto=<?php  echo $row["id_auto"];  ?>';}"><button type="button" class="btn btn-danger  btn-xs"><i class="fa fa-trash-o"></i></button></a>
                  </td>

                </tr>
           <?php
            }
            mysqli_close($conn);
            ?>

              </tbody>
              
              </table>
                  
                 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
