<?php
require 'header.php';
require 'user.php';
// $error=array();
if (isset($_POST['submit'])) {
    $name=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $user=new user();
    $connection=new Dbconnect();
    $show=$user->Login($name,$password,$connection->conn);    
    echo $show;
}

?>
            <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }               
            </script> 
            <script>
                    function save() {
                        var msg = document.getElementById('msg');
                        msg.innerHTML = 'Fare Calculated and the button disabled ☺';
                    }
            </script>
            <script>
                var enableSubmit = function(ele) {
                    $(ele).removeAttr("disabled");
                }
                $("#submit").click(function() {
                    var that = this;
                    $(this).attr("disabled", true);
                    setTimeout(function() { enableSubmit(that) }, 8000);
                });
            </script>
            <script>
                function timedText() {
                var x = document.getElementById("txt");
                setTimeout(function(){ x.value="1 seconds" }, 1000);
                setTimeout(function(){ x.value="2 seconds" }, 2000);
                setTimeout(function(){ x.value="4 seconds" }, 4000);
                setTimeout(function(){ x.value="6 seconds" }, 6000);
                }
            </script>

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
          <h4 tyle='color:red;margin:10px 0px 0px 30%;'></h4>
  
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
                                                <option value="select">Drop location</option>
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
                                        <input name="luggage" type="number" class="form-control" id="select4" disabled="disabled"
                                            placeholder="Luggage Inavailable">
                                    </div>
                                </div>
                                <div class="col-auto" style="width: 550px;">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                    <div class="input-group mb-2">
                                            <button class="btn btn-primary mb-2"  name="submit" id="btnn" type="submit" onClick = "this.style.visibility= 'hidden';timedText()" style="background-color: rgb(221, 236, 81);color: black;width: 520px;border: none;">Calculate Fare</button>
                                    
                                     <!-- <button class="btn btn-primary mb-2"  name="submit" id="btnn" type="submit" style="background-color: rgb(221, 236, 81);color: black;width: 520px;border: none;">Calculate Fare</button>
                                    -->
                                    </div>
                                    <div style="background-color: rgb(137, 137, 226); border-radius: 20px;">
                                        <p id="table" style="color: black;">  
                                                                           
                                        </p>
                                        <p id="table" style="color: green;"></p>                                        
                                      </div>
                                    <div class="input-group mb-2">                                             
                                  <a  class='btn btn-primary' href='alert.php' style="background-color: rgb(221, 236, 81);color: black;width: 520px;border: none;">Book Cab</a>
                                    </div>         
                                </div>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
<?php
require 'footer.php';

?>