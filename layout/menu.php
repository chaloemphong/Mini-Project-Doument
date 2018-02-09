 <?php
                //นับจำนวนแถวทั้งหมดของเอกสาร ในตาราง file
                $Sql  = "select * from  file ";
                $query = mysqli_query($conn,$Sql); 
                $row = mysqli_num_rows($query);
    ?>
<aside class="main-sidebar" >
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">            
          <li class="header">เมนูหลัก</li>
        <li><a href="index.php?page=home"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>
        
        <li><a href="index.php?page=data"><i class="fa fa-book"></i> <span>ข้อมูลเอกสาร</span> 
            <span class="pull-right-container">            
              <small class="label pull-right bg-red"><?php echo $row;  ?></small>
            </span>
        </li></a>
        
        
        <li class="header">ตั้งค่า</li>
        <li><a href="index.php?page=site_dep"><i class="fa fa-cog"></i><span>ตั้งค่าระบบ</span></a></li> 
        <li><a href="index.php?page=settings"><i class="fa fa-user" ></i><span>ตั้งค่าผู้ใช้</span></a></li>
      </ul>
    </section>
  
  </aside>