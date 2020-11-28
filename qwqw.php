<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

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

<!-- <nav class="navbar navbar-expand-lg navbar-light"> -->
    <!-- <a class="navbar-brand text-danger" href="#">
        <h1>Ced Taxi</h1>
    </a> -->
    <!-- <img class="navbar-brand img-fluid img-responsive" src="img/rsz_logo1.png">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item active">
                <a class="nav-link" href="#">ABOUT US <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">REVIEWS <span class="sr-only">(current)</span></a>
            </li>


        </ul>
    </div>
</nav> -->

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
                                    <button class="btn btn-primary mb-2" id="btnn" type="submit" style="background-color: rgb(221, 236, 81);color: black;width: 550px;border: none;">Calculate Fare</button>

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
























<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
