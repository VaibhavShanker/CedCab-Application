            <?php 
            session_start();
            if(isset($_SESSION['userdata']['name']))
                    {
                    
                    // if($_SESSION['userdata']['name']!="admin")
                    // {


            require "header_adminp.php";
            ?>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                   
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],              
              ['Approved', <?php    require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE isblock=2 AND is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo $count;  ?> ],
              ['Blocked',  <?php    require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE isblock=0 AND is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo $count; ?> ],              
              // ['All Users',   <?php require 'css.php';
              //                       mysqli_select_db($con,"ajax_demo");
              //                       $sql="SELECT * FROM tbl_user WHERE is_admin='1'";
              //                       $result = mysqli_query($con,$sql);
              //                       $count=mysqli_num_rows($result);
              //                       echo $count;  ?>  ], 
              ['Pending',    <?php  require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE isblock=1 AND is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo $count; ?> ],  
              ]);
              var options = {'title':'Users', 'width':1210, 'height':400};
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
            </script>
            <!-- <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }
          </script> -->
            <script>
            function loadDoc1() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("display").innerHTML =
                  this.responseText;.
                  
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
                      <div class="w3-container w3-orange w3-padding-16">
                          <div class="w3-left"><i class="fa fa-hourglass w3-xxxlarge"></i></div>
                            <div class="w3-right">
                            <?php                                  
                                  require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE isblock=1 AND is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo "<h3>$count</h3>";                         
                            ?>
                            </div>
                          <div class="w3-clear"></div>
                        <a href="#" onclick="loadDoc1()"><h4>Pending User Request</h4></a>        
                      </div>
                  </div>

                  <div class="w3-quarter">
                        <div class="w3-container w3-blue w3-padding-16">
                            <div class="w3-left"><i class="fa fa-thumbs-up w3-xxxlarge"></i></div>
                              <div class="w3-right">
                              <?php                                  
                                  require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE isblock=2 AND is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo "<h3>$count</h3>";                         
                              ?>
                              </div>
                            <div class="w3-clear"></div>
                          <a href="#" onclick="loadDoc2()"><h4>Approved Request</h4></a>          
                        </div>
                  </div>

                  <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                          <div class="w3-left"><i class="fa fa-user-times w3-xxxlarge"></i></div>
                              <div class="w3-right">
                              <?php                                  
                                  require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE isblock=0 AND is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo "<h3>$count</h3>";                         
                              ?>
                              </div>
                          <div class="w3-clear"></div>
                        <a href="#" onclick="loadDoc3()"><h4>Blocked User</h4></a>       
                    </div>
                  </div>

                  <div class="w3-quarter">
                      <div class="w3-container w3-teal w3-text-white w3-padding-16">
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
                          <div class="w3-clear"></div><a href="all_users.php"><h4>All User</h4>
                        </a>
                      </div>
                  </div>

              </div>
              
              <div id="display">
              </div>
              <div id="piechart"></div>
            </div>
            <?php 
                require "footer_adminp.php";
                        }                  
            ?>
