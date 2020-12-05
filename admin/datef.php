<?php 
session_start();
if(isset($_SESSION['userdata']['name']))
    {
    
    // if($_SESSION['userdata']['name']!="admin")
    // {
require "header_adminp.php";
?>



            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          <style>
                table {
                  width: 100%;
                  border-collapse: collapse;
                }
                table, td, th {
                  border: 1px solid black;
                  padding: 5px;
                }
                th {text-align: left;}
          </style>
      
          <script>
                  function loadDoc1() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "pending_ride.php", true);
                    xhttp.send();
                  }

                  function loadDoc2() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "completed_ride.php", true);
                    xhttp.send();
                  }
                  function loadDoc3() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "canceled_ride.php", true);
                    xhttp.send();
                  }
                  function loadDoc4() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "all_ride.php", true);
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
            <a href="ride.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-taxi fa-fw"></i> Ride</a>
              <a href="users.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  User</a>
              <a href="location.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-map-marker"></i>  Location</a>
              <a href="account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Account</a><br><br>
          </div>
          </nav>
          <!-- Overlay effect when opening sidebar on small screens -->
          <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
          <!-- !PAGE CONTENT! -->
          <div class="w3-main" style="margin-left:300px;margin-top:43px;">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
              <h5><b><i class="fa fa-dashboard"></i>Rides Dashboard</b></h5>
            </header>
            <div class="w3-row-padding w3-margin-bottom">
              <div class="w3-quarter">
                <div class="w3-container w3-blue w3-padding-16">
                  <div class="w3-left"><i class="fa fa-user-plus w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <?php
                          
                          require 'css.php';
                            mysqli_select_db($con,"ajax_demo");
                            $sql="SELECT * FROM tbl_ride WHERE status=1";
                            $result = mysqli_query($con,$sql);
                            $completed_canceled=mysqli_num_rows($result);
                            echo "<h3>$completed_canceled </h3>";                          
                ?>  
                  </div>
                  <div class="w3-clear"></div>
                  <a href="#" onclick="loadDoc1()">
                  <h4>Pending Request</h4>
                  </a>       
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-teal w3-padding-16">
                  <div class="w3-left"><i class="fa fa-check-square w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <?php
                          
                            require 'css.php';
                              mysqli_select_db($con,"ajax_demo");
                              $sql="SELECT * FROM tbl_ride WHERE status=2";
                              $result = mysqli_query($con,$sql);
                              $completed_canceled=mysqli_num_rows($result);
                              echo "<h3>$completed_canceled </h3>";                          
                  ?>                   
                  </div>
                  <div class="w3-clear"></div>
                  <a href="#"onclick="loadDoc2()">
                  <h4>Completed Request</h4>
                  </a>        
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-red w3-padding-16">
                  <div class="w3-left"><i class="fa fa-times w3-xxxlarge"></i></div>
                  <div class="w3-right">
                  <?php
                       
                        require 'css.php';
                          mysqli_select_db($con,"ajax_demo");
                          $sql="SELECT * FROM tbl_ride WHERE status=0";
                          $result = mysqli_query($con,$sql);
                          $count_canceled=mysqli_num_rows($result);
                          echo "<h3>$count_canceled </h3>";                         
                  ?>
                  <!-- <h3><?php echo $can_ride?></h3> -->
                  </div>
                  <div class="w3-clear"></div>
                  <a href="#" onclick="loadDoc3()">
                  <h4>Canceled Request</h4>
                  </a>
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                  <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
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
                  <a href="all_ride.php">
                  <h4>All Ride</h4>
                  </a>
                </div>
              </div>
            </div>
            <div id="display" >
            <?php
          require 'Dbconnect.php';
          require 'css.php';
          mysqli_select_db($con,"ajax_demo");
          $sql="SELECT * FROM tbl_ride ORDER BY ride_date ";
          $result = mysqli_query($con,$sql);
            // while($row = $result->fetch_assoc()) {
          echo " <li><a class='dropdown-toggle btn btn-primary' data-toggle='dropdown' href='#'>Ride </span></a>
                    <ul class='dropdown-menu'>
                    <li><a href='datef.php'>Short by Date</a></li>
                    <li><a href='pricef.php'>Short by Price</a></li>
                    <li><a href='distancef.php'>Short by Distance</a></li>
                    </ul>
                </li> <br>";
           
           
          //  <a  class='btn btn-primary' href=.php>Filter</a><br>";
              echo "<table class='table table-striped table-dark'>
              <tr>
              <th>Ride_id. </th>
              <th>Cab Type. </th>
              <th>Date. </th>
              <th>From. </th>
              <th>To. </th>
              <th>Distance. </th>
              <th>Luggage. </th>
              <th>Fare. </th>
              <th>States. </th>
              <th>customer. </th>
              </tr>";
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['ride_id'] . "</td>";
              echo "<td>" . $row['cab_type'] . "</td>";
              echo "<td>" . $row['ride_date'] . "</td>";
              echo "<td>" . $row['from_p'] . "</td>";
              echo "<td>" . $row['to_p'] . "</td>"; 
              echo "<td>" . $row['total_distance'] . "</td>"; 
              echo "<td>" . $row['luggage'] . "</td>"; 
              echo "<td>" . $row['total_fare'] . "</td>";
              echo "<td>" . $row['status'] . "</td>"; 
              echo "<td>" . $row['customer_user_id'] . "</td>";                         
              echo "</tr>";
          }
        // }
          echo "</table>";
          mysqli_close($con);
    ?>
          </div>
            </div>
            <?php 
              require "footer_adminp.php";

                      }
                
              ?>
