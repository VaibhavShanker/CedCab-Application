<?php
require 'user.php';
$error=array();
if (isset($_POST['submit'])) {
  $name=isset($_POST['username'])?$_POST['username']:'';
  $password=isset($_POST['password'])?$_POST['password']:'';
  $user=new user();
  $connection=new Dbconnect();
  $show=$user->Login1($name,$password,$connection->conn);
  echo $show;
}

if (isset($_POST['submit'])) {
    $username=isset($_POST['email'])?$_POST['email']:"";
    $name=isset($_POST['name'])?$_POST['name']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";
    $confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:"";
    $phone=isset($_POST['phone'])?$_POST['phone']:"";
    date_default_timezone_set("Asia/Calcutta");
    $date=date("Y-m-d h:i:s");
    $user=new user();
    $connection=new Dbconnect();
    $show=$user->register($username,$password,$name,$confirmpassword,$phone,$date,$connection->conn);
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="ced_taxi.css">
    <script src="https://kit.fontawesome.com/4b2ee26aaa.js" crossorigin="anonymous"></script>
    <title>Ced Taxi Register!</title>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <img class="navbar-brand img-fluid img-responsive" src="img/rsz_logo1.png">                
        <ul class="navbar-nav ml-auto mr-5">
                 <li class="nav-item active">
                  <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
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
            } ?>
        </h4>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-5" >
                <form action="#" method="post" style="padding: 10px">                
                    <input type="text" class="mycss2 fa fa-sign-in" name="username" placeholder="User Name!">
                    <input type="password" class="mycss2 fa fa-sign-in" name="password" placeholder="Passowrd">
                    <input type="submit" name="submit" value="Login" class="signupbt" id="submit"><br>
                </form>
            </ul>
        </div>
      </nav>
    </div>    
      <div class="container-fluid section2b" style="padding:0px;">
        <img class="img-fluid img-responsive" src="img/cedtaxi.jpg" alt="laptop" style="position: absolute;opacity:0.2;z-index:20;height:780px;width:100%;">
      </div>
      <div class="container-fluid section2a" style="background: none;padding-top: 0px;">
        <div class="container text-center">
          <h1 style="color: black;">Book a Ced Taxi to Your Destination in Town</h1>
          <p style="font-size: 20px;color: black;" >Choose from a range of categories and Prices.</p>
        </div>
              <h4 id='error'>
                            <?php 
                                  if (count($error)>0) {                                  
                                      echo $display; 
                                  } 
                            ?>
              </h4>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
            <form action="ced_register.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-green w3-margin" style="border-radius: 10px;">
              <h2 class="w3-center">Register Now!</h2>                
                <div class="w3-row w3-section ">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="email" type="email" placeholder="Email /User Name : ">
              </div>
                </div>
                <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="name" type="text" placeholder="Name">
                    </div>
                </div>
                <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="password" type="password" placeholder="Password">
                    </div>
                </div>

                <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="confirmpassword" type="password" placeholder="Confirm-Password :">
                    </div>
                </div>

                <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border" name="phone" type="number" placeholder="Phone">
                    </div>
                </div>
                <input type="submit" name="submit" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding mycss" value="Submit" id="submit">
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