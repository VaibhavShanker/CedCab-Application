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
    <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null };
    </script>
    <title>Pending Ride!</title>    
</head>

<body>
        <nav class="navbar navbar-inverse navbar-expand" style="width:100%;hight:90px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                         <img class="navbar-brand img-fluid img-responsive" src="img/rsz_logo1.png">
                         <a class="navbar-brand" href="#">Hello: <strong><i><?php echo $user ?></i></strong></a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="homeuser.php">User Dashboard</a></li>
                             <li><a href="book.php">Book Ride</a></li>
                            <li class="active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ride </span></a>
                                <ul class="dropdown-menu">
                                <li><a href="pending_ride_user.php">Pending Rides</a></li>
                                <li class="active"><a href="Canceled_ride_user.php">Canceled Rides</a></li>
                                <li><a href="all_ride_user.php">All Ride</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile </a>
                                <ul class="dropdown-menu">
                                <li><a href="#">Deteals</a></li>
                                <li><a href="#">Change Password</a></li>
                                </ul>
                            </li>
                     </ul>
                    <li style="text-align: right;color:white"><a href="index.php"><strong>Log Out</strong></a></li>
                </div>
        </nav> 

    <div class="container-fluid" style="padding:0px;">
        <div class="container-fluid section2"></div>
        <div class="container-fluid section2b" style="padding:0px;">
            <img class="img-fluid img-responsive" src="img/cedtaxi.jpg" alt="laptop"
                style="position: absolute;opacity:0.2;z-index:20;height:780px;width:100%;">
        </div>
        <div class="container-fluid section2a" style="background: none;padding-top: 0px;">
            <div class="container text-center">
                <h1>Wellcome: <?php echo $user ?></h1>
                <p style="font-size: 20px;">Choose from a range of categories and Prices.</p>
            </div>  
          
            <center><br>
                <div style="  border-radius: 5px;background-color: black;padding: 20px;">
                        <form action="">
                        <label for="fname">Old Password</label>
                        <input type="text" id="fname" name="firstname" placeholder="Old Password..">

                        <label for="lname">New Password</label>
                        <input type="text" id="lname" name="lastname" placeholder="New Password..">


                        <label for="lname">Re-Password</label>
                        <input type="text" id="lname" name="lastname" placeholder="Re-Password..">

                        <input type="submit" value="change Password">
                        </form>
                </div>             
                        </center>
    </div>

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
</body>

</html>