<!doctype html>
<html lang="en">
<?php 
session_start();

// $user = $_SESSION['userdata']['name'];
// $user_id = $_SESSION['userdata']['user_id'];
// echo $user_id;

?>
<head>

        
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="ced_taxi.css">
    
    <!-- ajax -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/4b2ee26aaa.js" crossorigin="anonymous"></script>

    <title>Ced Taxi!</title> 
   
    <script>

        $(function () {
        $("#select3").change(function () {
            if ($(this).val() == 1) {
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
</script>

</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- <a class="navbar-brand text-danger" href="#">
                <h1>Ced Taxi</h1>
            </a> -->
            <img class="navbar-brand img-fluid img-responsive" src="../img/rsz_logo1.png">
            <ul class="navbar-nav ml-auto mr-5">

            <div class="dropdown">

                    <button class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none" action="ced_taxi.php">
                        User Dashboard
                    </button>

            </div>

            <div class="dropdown">
                    <button class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none">
                        Ride
                    </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                        <a class="dropdown-item" href="user_panel/pending_ride_user.php" onclick="loadDoc1()">Pending Rides </a>
                        <a class="dropdown-item" href="Canceled_ride_user.php" onclick="loadDoc2()">Canceled Rides</a>
                        <a class="dropdown-item" href=All_ride_user.php" onclick="loadDoc3()">All Ride</a>
                    </div>
            </div>

            <div class="dropdown">
                    <button class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none">
                        Profile
                    </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                        <a class="dropdown-item" href="#" onclick="loadDoc4()">Deteals </a>
                        <a class="dropdown-item" href="#" onclick="loadDoc5()">Change Password</a>
                    </div>
            </div>





                </ul>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto mr-5" >
                  <form action="logout.php" method="post" style="padding: 10px">
                    <button type="submit" class="signupbt" name="register">Log Out</button>
                </form>  
              </ul>  

            </div>
        </nav>

    </div>


    <div class="container-fluid" style="padding:0px;">

        <div class="container-fluid section2">

        </div>

        <div class="container-fluid section2b" style="padding:0px;">
            <img class="img-fluid img-responsive" src="../img/cedtaxi.jpg" alt="laptop"
                style="position: absolute;opacity:0.2;z-index:20;height:780px;width:100%;">
        </div>

        <div class="container-fluid section2a" style="background: none;padding-top: 0px;">

            <div class="container text-center">

            <h1>Wellcome: </h1>
            <!-- <?php echo $user ?> -->
                <p style="font-size: 20px;">Choose from a range of categories and Prices.</p>

            </div>

            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <center><br>
       <?php
        //   require 'Dbconnect.php';
          require 'css.php';
            mysqli_select_db($con,"ajax_demo");
            $sql="SELECT * FROM tbl_ride WHERE customer_user_id='3' AND status='0' ";
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
                  echo "</tr>";
                }
            echo "</table>";
            mysqli_close($con);
        ?>

                         
                        </center>


                    </div>


                </div>
        </div>





    </div>

    <br>
    <br>


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

            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 mt-4 text-center">

                <ul class="list-unstyled">
                    <li class="float-left px-1"><a href="#" style="color: black;">ABOUT US</a></li>
                    <li class="float-left px-1"><a href="#" style="color: black;">REVIEW</a></li>
                    <li class="float-left px-1"><a href="#" style="color: black;">SIGN UP</a></li>
                </ul>

            </div>

        </div>

    </div>


<!-- 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script> -->


        


</body>

</html>