<?php
require 'user.php';
$error=array();
if (isset($_POST['submit'])) {
    $name=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $user=new user();
    $connection=new Dbconnect();
    $show=$user->Login($name,$password,$connection->conn);    
    echo $show;
}
?>
<!doctype html>
<html lang="en">
<head>
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
          <img class="navbar-brand img-fluid img-responsive" src="img/rsz_logo1.png">                  
          <ul class="navbar-nav ml-auto mr-5">
                   <li class="nav-item active">
                    <a class="nav-link" href="ced_taxi_index.php">HOME<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="#">ABOUT US <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="#">REVIEWS <span class="sr-only">(current)</span></a>
                  </li>                            
              </ul>  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h4 tyle='color:red;margin:10px 0px 0px 30%;'><?php 
              if (count($error)>0) {
              
                  echo $display; 
              } ?></h4>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">  
              <ul class="navbar-nav ml-auto mr-5" >
                  <form action="#" method="post" style="padding: 10px">                  
                      <input type="text" class="mycss2 fa fa-sign-in" name="username" placeholder="User Name!">  
                      <input type="password" class="mycss2 fa fa-sign-in" name="password" placeholder="Passowrd">
                      <input type="submit" name="submit" value="Login" class="signupbt" id="submit"><br>
                  </form>

                  <form action="ced_register.php" method="post" style="padding: 10px">
                    <button type="submit" class="signupbt" name="register">SIGN UP</button>
                </form>  
              </ul>  
          </div>
        </nav>  
      </div>

    <div class="container-fluid" style="padding:0px;">
        <div class="container-fluid section2">
        </div>
        <div class="container-fluid section2b" style="padding:0px;">
            <img class="img-fluid img-responsive" src="img/cedtaxi.jpg" alt="laptop"
                style="position: absolute;opacity:0.2;z-index:20;height:780px;width:100%;">
        </div>
        <div class="container-fluid section2a" style="background: none;padding-top: 0px;">
            <div class="container text-center">
                <h1>Book a Ced Taxi to Your Destination in Town</h1>
                <p style="font-size: 20px;">Choose from a range of categories and Prices.</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <div class="container-fluid" style="background-color: white;height: 450px;border-radius: 8px; ">
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
                                        <select class="form-control" id="select1">
                                            <option selected>Current location</option>
                                            <option>Charbagh</option>
                                            <option>Indira Nagar</option>
                                            <option>BBD</option>
                                            <option>Barabanki</option>
                                            <option>Faizabad</option>
                                            <option>Basti</option>
                                            <option>Gorakhpur</option>
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
                                        <select class="form-control" id="select2"
                                            placeholder="Enter drop for ride estimate">
                                            <option selected>Drop location</option>
                                            <option>Charbagh</option>
                                            <option>Indira Nagar</option>
                                            <option>BBD</option>
                                            <option>Barabanki</option>
                                            <option>Faizabad</option>
                                            <option>Basti</option>
                                            <option>Gorakhpur</option>
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
                                        <select class="form-control" id="select3"
                                            placeholder="Enter drop for ride estimate">
                                            <option selected>Select Cab Type</option>
                                            <option value="1">CedMicro</option>
                                            <option value="2">CedMini</option>
                                            <option value="3">CedRoyal</option>
                                            <option value="4">CedSUV</option>
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
                                        <input type="text" class="form-control" id="select4" disabled="disabled"
                                            placeholder="Luggage Inavailable">
                                    </div>
                                </div>
                                <div class="col-auto" style="width: 550px;">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                    <div class="input-group mb-2">
                                    
                                  <a  class='btn btn-primary' href='alert.php' style="background-color: rgb(221, 236, 81);color: black;width: 550px;border: none;">Calculate Fare</a>
                                            <!-- <button class="btn btn-primary mb-2" id="btnn" type="submit" style="background-color: rgb(221, 236, 81);color: black;width: 550px;border: none;">Calculate Fare</button>
                                   -->
                                        </div>
                                    <div style="background-color: rgb(137, 137, 226); border-radius: 20px;">
                                        <p id="table" style="color: black;">
                                        </p>
                                    </div>                                
                                </div>
                            </form>
                        </center>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>