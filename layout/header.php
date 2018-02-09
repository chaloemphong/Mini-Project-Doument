
<header class="main-header" >
    <!-- Logo -->
    <a href="index.php?page=home" class="logo" style="background-color: #660066" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">DocumentControl</span>
    </a>

    
    <nav class="navbar navbar-static-top" style="background-color: #660066;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background-color: #660066" >
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
      
       
        <?php
       
        $sqlselect = "select * from member where Username = '".$_SESSION["Username"]."'   ";
        $sqlq = mysqli_query($conn,$sqlselect);
        $result  = mysqli_fetch_array($sqlq);
    
    if($_SESSION["Username"] == ""){

      echo "<script type='text/javascript'>";
      echo "alert('กรุณาล็อกอินด้วยครับ');";
      echo "window.location = 'login.php';"; 
      echo "</script>"; 
} 
        ?>
     
         
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs" style="font-size: 20px; "><?php echo $result["Name"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color: #660066;">
                  <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p style="font-size: 20px; ">
                 <?php echo $result["Name"]; ?>
                
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="index.php?page=settings" class="btn btn-success btn-flat"><i class="fa fa-user"></i> Profile</a>
                </div>
                <div class="pull-right">
                    <a href="logout.php" class="btn btn-danger btn-flat"><i class="fa fa-power-off"></i> Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
    