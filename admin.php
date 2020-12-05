<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    echo "<script>alert('Directory access is forbidden need to Login.');
    window.location='index.php';
    </script>";
    exit;
}
?>
<?php
    require "Dbconnect.php";
    session_start();
    if (isset($_SESSION['userdata']))
    require "admin_header.php";
    if(isset($_SESSION['userdata']['name']))
    {
      
    

?>
<!DOCTYPE html>

 <body class="w3-light-grey"> 

          <!-- Top container -->
          <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <a class="w3-bar-item w3-right" href="logout.php"><i class="fa fa-sign-out">Log Out</i></a>
          </div>

          <!-- Sidebar/menu -->
          <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
              <div class="w3-col s4">
                <img src="img/logimg.png" class="w3-circle w3-margin-right" style="width:46px">
              </div>
              <div class="w3-col s8 w3-bar">
                <span>Welcome, <strong>Admin</strong></span><br>
                <a href="admin.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
              </div>
            </div>
            <hr>
            <div class="w3-container">
              <a href="admin.php" > <h5>Dashboard</h5></a>
            </div>
            <div class="w3-bar-block">
              <a href="admin/ride.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-taxi fa-fw"></i> Ride</a>
              <a href="admin/ride.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  User</a>
              <a href="admin/location.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-map-marker"></i>  Location</a>
              <a href="admin/account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Account</a><br><br>
            </div>
          </nav>
          <!-- Overlay effect when opening sidebar on small screens -->
          <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
          <!-- !PAGE CONTENT! -->
          <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
              <h5><b><i class="fa fa-dashboard"></i>Admin Dashboard</b></h5>
            </header>
            <div class="w3-row-padding w3-margin-bottom">
              <div class="w3-quarter">
                <div class="w3-container w3-blue w3-padding-16">
                  <div class="w3-left"><i class="fa fa-taxi w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <?php                         
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_ride";
                        $result = mysqli_query($con,$sql);
                        $completed_canceled=mysqli_num_rows($result);
                        echo "<h3>$completed_canceled </h3>";                          
                  ?>  
                  </div>
                  <div class="w3-clear"></div>
                  <a href="admin/ride.php">
                  <h4>Ride</h4>
                  </a>        
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-red w3-padding-16">
                  <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <?php                                  
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_user WHERE is_admin='1'";
                        $result = mysqli_query($con,$sql);
                        $count=mysqli_num_rows($result);
                        echo "<h3>$count</h3>";                         
                  ?>
                  </div>
                  <div class="w3-clear"></div>
                  <a href="admin/users.php">
                  <h4>Users</h4>
                  </a>
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-teal w3-padding-16">
                  <div class="w3-left"><i class="fa fa-map-marker w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <?php                                  
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_location";
                        $result = mysqli_query($con,$sql);
                        $count=mysqli_num_rows($result);
                        echo "<h3>$count</h3>";                         
                  ?>
                  </div>
                  <div class="w3-clear"></div>
                  <a href="admin/location.php">
                  <h4> Location</h4>
                  </a>        
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                  <div class="w3-left"><i class="fa fa-cog w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <h3>Update</h3>
                  </div>
                  <div class="w3-clear"></div>
                  <a href="admin/account.php">
                  <h4>Account</h4>
                  </a>
                </div>
              </div>
            </div>
            <div id="piechart"></div>
            </div>
      <!-- Footer -->
      <footer class="w3-container w3-padding-16 w3-light-grey" style="margin-top: 600px">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 mt-4 text-center">
        <h1 style="font-size: 35px;color:rgb(221, 236, 81)">Ced Taxi</h1>
        <p><i style="color:rgb(221, 236, 81) ;"></i>crafted By <strong>Vaibhav Shanker</strong></p>
        </div>
      </footer>  
</div>

        <script>
              var mySidebar = document.getElementById("mySidebar");
              var overlayBg = document.getElementById("myOverlay");
              function w3_open() {
                if (mySidebar.style.display === 'block') {
                  mySidebar.style.display = 'none';
                  overlayBg.style.display = "none";
                } else {
                  mySidebar.style.display = 'block';
                  overlayBg.style.display = "block";
                }
              }
              function w3_close() {
                mySidebar.style.display = "none";
                overlayBg.style.display = "none";
              }
        </script>


  

</body>
</html>



<?php
}

?>






