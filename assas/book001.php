<!doctype html>
<html lang="en">
    <?php 
    session_start();
    $user = $_SESSION['userdata']['name'];
    $user_id = $_SESSION['userdata']['userid'];
    ?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="ced_taxi.css"> 
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
        <title>Book!</title> 
        
            <script>
                $(function () {
                $("#select3").change(function () {
                    if ($(this).val() == CedMicr) {
                        $("#select4").attr("disabled", "disabled");
                        $("#select4").attr("placeholder", "Luggage Inavailable");
                    } else {
                        $("#select4").removeAttr("disabled");
                        $("#select4").attr("placeholder", "Enter the Luggage Weight");
                        $("#select4").focus();
                    }
                });
                $("#btnn").click(function (e) {
                    e.preventDefault();
                    var a = $("#select1").val();
                    var b = $("#select2").val();
                    var c = $("#select3").val();
                    var d = $("#select4").val();
                    console.log(a, b, c, d);
                    $.ajax({                
                        url: 'ced_cal.php',
                        type: "POST",                
                        data: {PICKUP: a, DROP: b, cab: c, Luggage: d},
                        success: function (result) {
                            // alert(result);
                        $('#table').append(result);                   
                        },
                        error: function () {
                            alert("error");
                        }
                    });
                });        
                });
                function myFunction() {
                    var x = document.getElementById("myDIV");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                    }
            </script>
          
    </head>
    <body>
            <nav class="navbar navbar-inverse navbar-expand" style="width:100%;hight:90px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                         <img class="navbar-brand img-fluid img-responsive" src="img/rsz_logo1.png">
                         <a class="navbar-brand" href="homeuser.php">Hello: <strong><i><?php echo $user ?></i></strong></a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li><a href="homeuser.php">User Dashboard</a></li>
                             <li class="active"><a href="book.php">Book Ride</a></li>
                            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ride </span></a>
                                <ul class="dropdown-menu">
                                <li><a href="user_panel/pending_ride_user.php">Pending Rides</a></li>
                                <li><a href="user_panel/Canceled_ride_user.php">Canceled Rides</a></li>
                                <li><a href="user_panel/completed_ride_user.php">Completed Rides</a></li>
                                
                                <li><a href="user_panel/all_ride_user.php">All Ride</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile </a>
                                <ul class="dropdown-menu">
                                <li><a href="user_panel/deteals_user.php">Deteals</a></li>
                                <li><a href="user_panel/change_pass.php">Change Password</a></li>
                                </ul>
                            </li>
                     </ul>
                     <li style="text-align: right;color:white"><a href="logout.php"><strong><i class="fa fa-sign-out">Log Out</i></strong></a></li>
                </div>
        </nav> 
    <div class="container-fluid" style="padding:0px;">
        <div class="container-fluid section2">
        </div>
        <div class="container-fluid section2b" style="padding:0px;">
            <img class="img-fluid img-responsive" src="img/cedtaxi.jpg" alt="laptop"
                style="position: absolute;opacity:0.2;z-index:20;height:780px;width:100%;">
        </div>
        <div class="container-fluid section2a" style="background: none;padding-top: 0px;">
            <div class="container text-center">
                <h1>Wellcome: <?php echo $user ?></h1>
                <p style="font-size: 20px;">Choose from a range of categories and Prices.</p>
            </div>

     

                    <?php

                    require 'css.php';
                    $error=array();
                    if (isset($_POST['submit'])) {
                        
                        $cab=isset($_POST['cab'])?$_POST['cab']:'';
                        date_default_timezone_set("Asia/Calcutta");
                        $date=date("Y-m-d h:i:s");
                        $pick=isset($_POST['pick'])?$_POST['pick']:'';
                        $drop=isset($_POST['drop'])?$_POST['drop']:'';                        
                        $select=isset($_POST['luggage'])?$_POST['luggage']:''; 
                        $newdis = $_SESSION['distance'];
                        $cabfair = $_SESSION['totalFare']; 
                        // echo $cab,$pick,$drop,$select,$date,$user;                          
                        if (count($error)==0) {
                            
                            $sql = "INSERT INTO tbl_ride( cab_type, ride_date, from_p, to_p, total_distance, luggage, total_fare, customer_user_id)
                            VALUES ('".$cab."', '".$date."', '".$pick."', '".$drop."', '".$newdis."', '".$select."', '".$cabfair."', '".$user_id."')";
                            if ($con->query($sql) === true) {
                                echo "<script>alert('Cab Booking successfully');</script>";
                                echo "<script>alert('Please wait few mins so that admin can grand permission');
                                window.location='user_panel/pending_ride_user.php';</script>";
                                echo " <br>";                                  
                            } else {
                                echo $con->error;
                                echo "<script>alert('Cab NOT Booking');</script>";
                            } 
                        }   
                    }
                    ?>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <div class="container-fluid" style="background-color: white;height:550px;border-radius: 8px; ">
                        <center><br>
                            <button class="btn btn-outline-danger my-2 my-sm-0 button2">CED Taxi</button>
                            <h2 style="color: black;">Your everyday travel partner</h2>
                            <p style="color: black;">AC Cabs for point to point travel</p>
                            <form action="" method="POST">
                                <div class="col-auto" style="width: 550px;">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">PICKUP</div>
                                        </div>
                                        <?php
                                            require 'css.php';
                                            $sql = "SELECT * FROM tbl_location";
                                            $result = $con->query($sql);                                            
                                        ?>                                                   
                                            <select name="pick" class="form-control" id="select1" placeholder="Enter drop for ride estimate">               
                                                <option selected>Current location</option>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option>".$row['name']."</option>";
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }                                                
                                                ?>                                             
                                            </select>
                                    </div>
                                </div>
                                <div class="col-auto" style="width: 550px;">
                                    <label class="sr-only" for="inlineFormInputGroup">Enter drop for ride
                                        estimate</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">DROP </div>
                                        </div>
                                        <?php
                                            require 'css.php';
                                            $sql = "SELECT * FROM tbl_location";
                                            $result = $con->query($sql);                                            
                                        ?>                                                   
                                            <select name="drop" class="form-control" id="select2" placeholder="Enter drop for ride estimate">               
                                                <option selected>Drop location</option>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option>".$row['name']."</option>";
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }                                                
                                                ?>                                             
                                            </select>
                                    </div>
                                </div>
                                <div id="cab" class="col-auto" style="width: 550px;">
                                    <label class="sr-only" for="inlineFormInputGroup">Enter drop for ride
                                        estimate</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">CAB TYPE </div>
                                        </div>
                                        <select name="cab" class="form-control" id="select3"
                                            placeholder="Enter drop for ride estimate">
                                            <option selected>Select Cab Type</option>
                                            <option value="CedMicr">CedMicro</option>
                                            <option value="CedMini">CedMini</option>
                                            <option value="CedRoyal">CedRoyal</option>
                                            <option value="CedSUV">CedSUV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto" style="width: 550px;">
                                    <label class="sr-only" for="inlineFormInputGroup">Enter drop for ride
                                        estimate</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Luggage </div>
                                        </div>
                                        <input name="luggage" type="text" class="form-control" id="select4" disabled="disabled"
                                            placeholder="Luggage Inavailable">
                                    </div>
                                </div>
                                <div class="col-auto" style="width: 550px;">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                    <div class="input-group mb-2">
                                            <button class="btn btn-primary mb-2"  name="submit" id="btnn" type="submit" style="background-color: rgb(221, 236, 81);color: black;width: 520px;border: none;">Calculate Fare</button>
                                    </div>
                                    <div style="background-color: rgb(137, 137, 226); border-radius: 20px;">
                                        <p id="table" style="color: black;">                                        
                                        </p>
                                        <p id="table" style="color: green;"></p>
                                        
                                      </div>
                                    <div class="input-group mb-2">
                                            <button class="btn btn-primary mb-2" name="submit" id="btnn" type="submit" value="submit" style="background-color: rgb(221, 236, 81);color: black;width: 520px;border: none;">Book Cab</button>
                                    </div>
         
                                </div>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 mt-4 text-center">
               <h1 style="font-size: 35px;color:rgb(221, 236, 81)">Ced Taxi</h1>
                <p><i style="color:rgb(221, 236, 81) ;"></i>crafted By <strong>Vaibhav Shanker</strong></p>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 text-center">
                <center>
                    <i class="fab fa-facebook" style="font-size: 30px;"></i>
                    <i class="fab fa-twitter-square" style="padding: 30px; font-size: 30px;"></i>
                    <i class="fab fa-instagram-square" style="padding: 20px; font-size: 30px;"></i>
                </center>
            </div>
        </div>
    </div>

</body>

</html>