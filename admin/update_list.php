<?php 
session_start();
if(isset($_SESSION['userdata']['name']))
    {
    
    // if($_SESSION['userdata']['name']!="admin")
    // {

require "header_adminp.php";
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
          </script>.
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
            $dis_id=$_REQUEST['dis_id'];
                require "css.php";
                $errors=array();
                    if (isset($_POST['update'])) {
                        $name=isset($_POST['name'])?$_POST['name']:'';
                        $mobile=isset($_POST['mobile'])?$_POST['mobile']:''; 
                        $states=isset($_POST['states'])?$_POST['states']:'';  
                        

                        $sql = "UPDATE tbl_location SET `name`='$name' WHERE `id`='$dis_id'";  
                        if ($con->query($sql) === TRUE) {       
                                         
                          } else {  
                            echo "Error updating record: " . $con->error;
                      }                                  
                        $sql = "UPDATE tbl_location SET `distance`='$mobile' WHERE `id`='$dis_id'";
                        if ($con->query($sql) === TRUE) {       
                                               
                          } else { 
                            echo "Error updating record: " . $con->error;
                      }                                 
                      $sql = "UPDATE tbl_location SET `is_available`='$states' WHERE `id`='$dis_id'";
                      if ($con->query($sql) === TRUE) {       
                      echo "<script>alert('Updated successfully');</script>";                       
                      } else {
                      echo "Error updating record: " . $con->error;
                      }
                      $con->close();
                  }
            ?>
            <div style="  border-radius: 5px;background-color: black;padding: 20px;">
           
            <?php
            $dis_id=$_REQUEST['dis_id'];
                  require 'Dbconnect.php';
                  require 'css.php';
                    mysqli_select_db($con,"ajax_demo");
                    $sql="SELECT * FROM tbl_location WHERE id='$dis_id'";
                    $result = mysqli_query($con,$sql);                        
                    while($row = mysqli_fetch_array($result)) {
                        echo 
                            "<form action='' method='POST'>                        
                                <label for='fname'>User Name</label>
                                <input type='text'  name='name' pattern='[A-Za-z].{2,}' title='Min 3 letter need  city code' placeholder='Location..' value=" . $row['name'] .">                            
                                <label for='lname'>Mobile No.</label>
                                <input type='number' name='mobile' pattern='[0-9].{2,6}' title='Not more then Six characters' placeholder='Distance..'  value=". $row['distance'] ." maxlength='5'/>            
                                <label for='lname'>States.</label>
                                <input type='number' name='states' placeholder='Available'  value=". $row['is_available'] ." maxlength='1'/>
                                <input class='btn btn-primary' type='submit' name='update' value='Update.'>
                           
                                </form>";          
                    }
                mysqli_close($con);
            ?>  

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
            <?php 
            require "footer_adminp.php";
                      }
                 
            ?>
