<!doctype html>
<html lang="en">
    <?php 
        session_start();
        $user = $_SESSION['userdata']['name'];
        $user_id = $_SESSION['userdata']['userid'];
        if(isset($_SESSION['userdata']['name']))
        {
        
        if($_SESSION['userdata']['name']!="admin")
        {
    ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    
            input[type=text], select {
              width: 100%;
              padding: 12px 20px;
              color: black;
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="ced_taxi.css">  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- ajax -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/4b2ee26aaa.js" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }
          </script> -->
    <title>Deteals!</title>    
</head>
<body>
        <nav class="navbar navbar-inverse navbar-expand" style="width:100%;hight:90px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                         <img class="navbar-brand img-fluid img-responsive" src="../img/rsz_logo1.png">
                         <a class="navbar-brand" href="../homeuser.php">Hello: <strong><i><?php echo $user ?></i></strong></a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li><a href="../homeuser.php">User Dashboard</a></li>
                             <li><a href="../book.php">Book Ride</a></li>
                            <li ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ride </span></a>
                                <ul class="dropdown-menu">
                                <li><a href="pending_ride_user.php">Pending Rides</a></li>
                                <li ><a href="Canceled_ride_user.php">Canceled Rides</a></li>
                                <li><a href="completed_ride_user.php">Completed Rides</a></li>                                
                                <li class="active"><a href="all_ride_user.php">All Ride</a></li>
                                </ul>
                            </li>
                            <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile </a>
                                <ul class="dropdown-menu">
                                <li class="active"><a href="deteals_user.php">Deteals</a></li>
                                <li><a href="change_pass.php">Change Password</a></li>
                                </ul>
                            </li>
                     </ul>
                     <li style="text-align: right;color:white"><a href="../logout.php"><strong><i class="fa fa-sign-out">Log Out</i></strong></a></li>
               </div>
        </nav> 
    <div class="container-fluid" style="padding:0px;">
        <div class="container-fluid section2"></div>
        <div class="container-fluid section2b" style="padding:0px;">
            <img class="img-fluid img-responsive" src="../img/cedtaxi.jpg" alt="laptop"
                style="position: absolute;opacity:0.2;z-index:20;height:780px;width:100%;">
        </div>
        <div class="container-fluid section2a" style="background: none;padding-top: 0px;">
            <div class="container text-center">
                <h1>Update Detals </h1>                
            </div>  
            <center><br>
            <div id="display" style="with:550px;">

<?php
    require "css.php";
    $errors=array();
        if (isset($_POST['updatename'])) {
            $name=isset($_POST['name'])?$_POST['name']:'';
            $mobile=isset($_POST['mobile'])?$_POST['mobile']:'';  
            // echo $name,$mobile;

            $sql = "UPDATE tbl_user SET `name`='$name' WHERE `user_id`='$user_id'";
            if ($con->query($sql) === TRUE) {       
            echo "<script>alert('User Name Updated successfully');</script>";                       
            } else {
            echo "Error updating record: " . $con->error;
            }

        }
        if (isset($_POST['updatemobile'])) {
            $name=isset($_POST['name'])?$_POST['name']:'';
            $mobile=isset($_POST['mobile'])?$_POST['mobile']:'';  
            // echo $name,$mobile;

            $sql = "UPDATE tbl_user SET `mobile`='$mobile' WHERE `user_id`='$user_id'";
            if ($con->query($sql) === TRUE) {       
            echo "<script>alert('User Mobile No. Updated successfully');</script>";                       
            } else {
            echo "Error updating record: " . $con->error;
            }
            $con->close();
        }
?>
            <div style="  border-radius: 5px;background-color: black;padding: 20px;">
           
            
 
                            <form action='' method='POST'>                        
                                <label for='fname'>User Name</label>
                                <input type='text'  name='name' placeholder='User Name..' value='*********'>
                                <input class='btn btn-primary' type='submit' name='updatename' value='Update Name'>
                                <label for='lname'>Mobile No.</label>
                                <input type='text' name='mobile' placeholder='Mobile No...'  value='********'>
                                <input class='btn btn-primary' type='submit' name='updatemobile' value='Update Mobile No.'>
                            </form>;          
                               

            </div>
            </div>

</div> 

        </center>       
        </div>
    </div>
    <?php
require 'user_footerp.php';

    }
}
 ?>
