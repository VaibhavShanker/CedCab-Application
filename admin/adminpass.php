<?php
    require "Dbconnect.php";
    session_start();
    
    require "header_adminp.php";

    if(isset($_SESSION['userdata']['name']))
    {
    
    
  ?>

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
                  
                    input[type=password], select {
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    color: black;
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
  xhttp.open("GET", "update_pass.php", true);
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
    <a href="location.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-map-marker"></i>  Location</a>
    <a href="account.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-cog fa-fw"></i> Account</a><br><br>

</div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

            <!-- !PAGE CONTENT! -->
            <div class="w3-main" style="margin-left:300px;margin-top:43px;">

                        <!-- Header -->
                        <header class="w3-container" style="padding-top:22px">
                            <h5><b><i class="fa fa-dashboard"></i> Account Dashboard</b></h5>
                        </header>

                        <div class="w3-row-padding w3-margin-bottom">
                            <div class="w3-quarter">
                                <div class="w3-container w3-blue w3-padding-16">
                                    <div class="w3-left"><i class="fa fa-cogs w3-xxxlarge"></i></div>
                                    <div class="w3-right">                  
                                    </div>
                                    <div class="w3-clear"></div>
                                    <a href="#">
                                    <a href="adminpass.php"><h4>Change Password</h4></a>         
                                    </a>
                                </div>
                            </div>
                        </div>           
                        <div id="display"></div>

                        <?php
                            require "css.php";
                            $errors=array();
                                if (isset($_POST['submit'])) {
                                    $oldpass=isset($_POST['oldpass'])?$_POST['oldpass']:'';
                                    $newpass=isset($_POST['newpass'])?$_POST['newpass']:'';
                                    $newpass2=isset($_POST['newpass2'])?$_POST['newpass2']:'';  
                                    // echo $oldpass,$newpass,$newpass2,$user_id;  
                                    $errors=array();
                                    if ($oldpass=="" || $newpass=="" || $newpass2=="") {
                                        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
                                    }
                                    if ($newpass!=$newpass2) {
                                        $error[]=array("id"=>'form','msg'=>"Password does not matches ");
                                    }                       
                                        $sql = "UPDATE tbl_user SET `password`='$newpass' WHERE `is_admin`='0'";
                                        if ($con->query($sql) === TRUE) {       
                                        echo "<script>alert('Password Updated successfully');</script>";                       
                                        } else {
                                        echo "Error updating record: " . $con->error;
                                        }                             
                                    $con->close();
                                }
                        ?>
                    <center><br>
                        <div style="border-radius: 5px;background-color: black;padding: 20px;hight:500px;">
                                <form action="" method="POST">
                                    <label for="fname">Old Password</label>
                                    <input type="password" id="fname" name="Oldpass" placeholder="Old Password..">
                                    <label for="lname">New Password</label>
                                    <input type="password" id="lname" name="newpass" placeholder="New Password..">
                                    <label for="lname">Re-Password</label>
                                    <input type="password" id="lname" name="newpass2" placeholder="Re-Password..">
                                    <input class='btn btn-primary' type="submit" name="submit" value="submit">
                                </form>
                        </div>             
                    </center>
    </div>


                                    
            </div>
            <?php 
            require "footer_adminp.php";

                              }
                          
            ?>
