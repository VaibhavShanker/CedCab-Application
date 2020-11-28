<!DOCTYPE html>
<html>
<title>Admin Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
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
      document.getElementById("display").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "pending_user.php", true);
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
  xhttp.open("GET", "approved_user.php", true);
  xhttp.send();
}

function loadDoc3() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "blocked_user.php", true);
  xhttp.send();
}

function loadDoc4() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "all_users.php", true);
  xhttp.send();
}
</script>





      <body class="w3-light-grey">

              <!-- Top container -->
              <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
                <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
                <a class="w3-bar-item w3-right" href="../ced_taxi_index.php">Log Out</a>
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
                  <a href="users.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  User</a>
                  <a href="location.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-map-marker"></i>  Location</a>
                  <a href="account.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Account</a><br><br>

              </div>
              </nav>


          <!-- Overlay effect when opening sidebar on small screens -->
          <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

            <!-- !PAGE CONTENT! -->
            <div class="w3-main" style="margin-left:300px;margin-top:43px;">

              <!-- Header -->
              <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-dashboard"></i> Users Dashboard</b></h5>
              </header>

              <div class="w3-row-padding w3-margin-bottom">
                  <div class="w3-quarter">
                      <div class="w3-container w3-teal w3-padding-16">
                          <div class="w3-left"><i class="fa fa-hourglass w3-xxxlarge"></i></div>
                            <div class="w3-right">
                              <h3>52</h3>
                            </div>
                          <div class="w3-clear"></div>
                        <a href="#" onclick="loadDoc1()"><h4>Pending User Request</h4></a>        
                      </div>
                  </div>

                  <div class="w3-quarter">
                        <div class="w3-container w3-blue w3-padding-16">
                            <div class="w3-left"><i class="fa fa-thumbs-up w3-xxxlarge"></i></div>
                              <div class="w3-right">
                                <h3>23</h3>
                              </div>
                            <div class="w3-clear"></div>
                          <a href="#" onclick="loadDoc2()"><h4>Approved Request</h4></a>          
                        </div>
                  </div>

                  <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                          <div class="w3-left"><i class="fa fa-user-times w3-xxxlarge"></i></div>
                              <div class="w3-right">
                                <h3>99</h3>
                              </div>
                          <div class="w3-clear"></div>
                        <a href="#" onclick="loadDoc3()"><h4>Blocked User</h4></a>       
                    </div>
                  </div>

                  <div class="w3-quarter">
                      <div class="w3-container w3-orange w3-text-white w3-padding-16">
                          <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                              <div class="w3-right">
                                <h3>50</h3>
                              </div>
                          <div class="w3-clear"></div><a href="#" onclick="loadDoc4()"><h4>All User</h4>
                        </a>
                      </div>
                  </div>

              </div>
              
              <div id="display">
              </div>

              <?php
         $id=$_REQUEST["id"];
          require 'Dbconnect.php';
          require 'css.php';
          mysqli_select_db($con,"ajax_demo");
          $sql="SELECT * FROM tbl_ride WHERE `customer_user_id`='$id'";
          $result = mysqli_query($con,$sql);
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
          <th>Print</th>
          </tr>";
      while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['ride_id'] . "</td>";
          echo "<td>" . $row['cab_type'] . "</td>";
          echo "<td>" . $row['ride_date'] . "</td>";
          echo "<td>" . $row['from'] . "</td>";
          echo "<td>" . $row['to'] . "</td>"; 
          echo "<td>" . $row['total_distance'] . "</td>"; 
          echo "<td>" . $row['luggage'] . "</td>"; 
          echo "<td>" . $row['total_fare'] . "</td>";
          echo "<td>" . $row['status'] . "</td>"; 
          echo "<td>" . $row['customer_user_id'] . "</td>";
          echo "<td> <a  class='btn btn-primary' href=print.php?id=".$row["ride_id"].">Print Invoice</a> </td>"; 
                                         
          echo "</tr>";
          }
          echo "</table>";
          mysqli_close($con);
    ?>
            </div>
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
