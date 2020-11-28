<?php
require 'user.php';
$error=array();

$user=new user();
  $connection=new Dbconnect();
  $show=$user->update();


?>



<!DOCTYPE html>
<html>
  <head>
    <title>User Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#ud").click(function(){
          $("#userdata").load("userdata.php");
        });
      });
    </script>

  <head>



<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <a class="w3-bar-item w3-right" href="ced_taxi_index.php">Log Out</a>
  
  
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/logimg.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>

      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" id="ud" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-user fa-fw"></i> Update Profile</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Previous Rides</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>Spents History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-taxi fa-fw"></i> Book cab</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <a href="#">
        <h4>Update Profile</h4>
        </a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <a href="#">
        <h4>Previous Ride</h4>
        </a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-history w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <a href="#">
        <h4>Spents History</h4>
        </a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-taxi w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <a href="#">
        <h4>Book Cab</h4>
        </a>
      </div>
    </div>
  </div>

  <p id="p1">hello user</p> 


  <p css(display:'none'})>If you click on the "Hide" button, I will disappear.</p>

  <button id="hide">Hide</button>
  <button id="show">Show</button>

    <!-- <div class="table-responrive">
      <table class="table table-bordered">
        <tr>
          <td width="30%">User_Name</td>
          <td width="50">name</td>
          <td width="30%">Edit</td>
          <td width="50">Delete</td>
        </tr>
        <?php
        $post_data = $data->select('tbl_user');
        print_r(post_data);
        ?>

      </table>
    </div> -->

<!-- <?php

      require "config.php";
      $sql = "SELECT * from tbl_user" ;
      $result =$conn->query($sql);
      if ($result->num_rows> 0) {
      while($row =$result->fetch_assoc()) {
          echo "<div class='Heading'>
                  <a><img src=".$row['user_name']." /></a>                                  
                  <h1>".$row['name']."</h1>
                  <h4>".$row['mobile']."</h4>
                    <p>
                      <b>
                        <a href='login.php'>Update</a>                      
                      </b>
                    </p>
                </div>                                    
                ";
          }
      }

      ?> -->



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













