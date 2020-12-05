
<?php
    require "Dbconnect.php";
    session_start();
    // if (isset($_SESSION['userdata']))
    require "header_adminp.php";
    if(isset($_SESSION['userdata']['name']))
    {
    
  
?>

          <style>
            input[type=text], select {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }
            input[type=number], select {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }
            input[type=submit] {
              width: 100%;
              background-color: DodgerBlue;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            input[type=submit]:hover {
              background-color: #45a049;
            }
        </style>
          <script>
          function loadDoc1() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("display").innerHTML =
                this.responseText;
              }
            };
            xhttp.open("GET", "add_location.php", true);
            xhttp.send();
          }
          function loadDoc2() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("display").innerHTML =
                this.responseText;
              }
            };
            xhttp.open("GET", "location_list.php", true);
            xhttp.send();
          }
          </script>
          <!-- <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }
          </script> -->
          <body class="w3-light-grey">
          <!-- Top container -->
          <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <a class="w3-bar-item w3-right" href="../logout.php"><i class="fa fa-sign-out">Log Out</i></a>
          </div>
          <!-- Sidebar/menu -->
          <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
              <div class="w3-col s4">
                <img src="logimg.png" class="w3-circle w3-margin-right" style="width:46px">
              </div>
              <div class="w3-col s8 w3-bar">
                <span>Welcome, <strong>Admin</strong></span><br>
                <a href="../admin.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
              </div>
            </div>
            <hr>
            <div class="w3-container">
            <a href="../admin.php"> <h5>Dashboard</h5></a>
            </div>
            <div class="w3-bar-block">
            <a href="ride.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-taxi fa-fw"></i> Ride</a>
              <a href="users.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  User</a>
              <a href="location.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-map-marker"></i>  Location</a>
              <a href="account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Account</a><br><br>
          </div>
          </nav>
          <!-- Overlay effect when opening sidebar on small screens -->
          <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
          <!-- !PAGE CONTENT! -->
          <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
              <h5><b><i class="fa fa-dashboard"></i> Location Dashboard</b></h5>
            </header>
            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                      <div class="w3-container w3-blue w3-padding-16">
                          <div class="w3-left"><i class="fa fa-plus-square-o w3-xxxlarge"></i></div>
                            <div class="w3-right">
                              <h3 style="hiden">New</h3>
                            </div>
                          <div class="w3-clear"></div>
                          <a href="add_location.php" >
                        <h4>Add New Location</h4>
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
                        <a href="#" onclick="loadDoc2()">
                      <h4>Location List</h4>
                      </a>                  
                    </div>
                </div>

            </div>
            <div id="display" style="with:550px;">

                <?php
                    require "css.php";
                    $errors=array();
                if (isset($_POST['submit'])) {
                    $name=isset($_POST['location'])?$_POST['location']:'';
                    $distance=isset($_POST['distance'])?$_POST['distance']:'';  
                    // echo $name,$distance; 
                  $sql="SELECT * from tbl_location WHERE name='".$name."'
                  OR distance='".$distance."'";
                    $result=$con->query($sql);
                    if ($result->num_rows > 0) {
                        $errors[] = array("input"=>"form","msg"=>"Location Already Present");
                    }
                    if (count($errors)==0) {
                        $sql="INSERT INTO tbl_location (name, distance)
                      VALUES ('".$name."','".$distance."')";
                        if ($con->query($sql) == true) {
                            echo "<script>alert('Location Added Successfully')</script>";
                          
                        } else {
                            $errors[]=array("input"=>"form","msg"=>"Failed to Add");
                        }        
                    } else {
                        foreach ($errors as $error) {            
                            echo  "<script>alert('* ".$error['msg']."')</script>";
                        
                        }
                    }
                    $con->close();
                }
                ?>

                <div style="  border-radius: 5px;background-color: black;padding: 20px;">
                  <form action="" method="POST">
                    <label for="fname">Location</label>
                    <input type="text" id="fname" name="location" pattern='[A-Za-z].{2,}' title='Min 3 letter need  city code' placeholder="Location..">
                    <label for="lname">Distance</label>
                    <input type="number" id="lname" name="distance" pattern='[0-9].{1,8}' title='Not more then 8' placeholder="Distance..">
                    <input type="submit" name="submit" value="submit">
                  </form>
                </div>
                </div>

                </div> 

                <script>
            // Get the Sidebar
            var mySidebar = document.getElementById("mySidebar");
            // Get the DIV with overlay effect
            var overlayBg = document.getElementById("myOverlay");
            // Toggle between showing and hiding the sidebar, and add overlay effect
            function w3_open() {
              if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
              } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
              }
            }
            // Close the sidebar with the close button
            function w3_close() {
              mySidebar.style.display = "none";
              overlayBg.style.display = "none";
            }
            </script>
            <!-- Footer -->
            <footer class="w3-container w3-padding-16 w3-light-grey" style="margin-top: 600px">
              <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 mt-4 text-center">
                  <h1 style="font-size: 35px;color:rgb(221, 236, 81)">Ced Taxi</h1>
                  <p><i style="color:rgb(221, 236, 81) ;"></i>crafted By <strong>Vaibhav Shanker</strong></p>
              </div>
            </footer>
            <!-- End page content -->
          </div>
            <script>
            // Get the Sidebar
            var mySidebar = document.getElementById("mySidebar");
            // Get the DIV with overlay effect
            var overlayBg = document.getElementById("myOverlay");
            // Toggle between showing and hiding the sidebar, and add overlay effect
            function w3_open() {
              if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
              } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
              }
            }
            // Close the sidebar with the close button
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