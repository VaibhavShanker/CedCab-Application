<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    echo "<script>alert('Directory access is forbidden need to Login.');
                        window.location='index.php';
                        </script>";
    exit;
}
?>
<!doctype html>
<html lang="en">
<?php 
session_start();
$user = $_SESSION['userdata']['name'];
$user_id = $_SESSION['userdata']['userid'];

require "user_header.php";
// require 'user.php';
if(isset($_SESSION['userdata']['name']))
{

if($_SESSION['userdata']['name']!="admin")
{
?>
    
<body>
        <nav class="navbar navbar-inverse navbar-expand" style="width:100%;hight:90px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                         <img class="navbar-brand img-fluid img-responsive" src="img/rsz_logo1.png">
                         <a class="navbar-brand" href="homeuser.php">Hello: <strong><i><?php echo $user ?></i></strong></a>
                    </div>
                    <ul class="nav navbar-nav">
                         <li class="active"><a href="homeuser.php">User Dashboard</a></li>
                             <li><a href="book.php">Book Ride</a></li>
                            <li><a class="dropdown-toggle" data-toggle="dropdown">Ride </span></a>
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
        <center>
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
            <div class="w3-row-padding w3-margin-bottom">            
            <div class="w3-quarter">
                <div class="w3-container w3-blue w3-padding-16">
                    <div class="w3-left"><i class="fa fa-plus w3-xxxlarge" w3-xxxlarge"></i></div>
                    <div class="w3-right">
                    <?php
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='1' ";
                        $result = mysqli_query($con,$sql);
                        $completed_canceled=mysqli_num_rows($result);
                        echo "<h3>$completed_canceled </h3>";                          
                    ?>  
                    </div>
                    <div class="w3-clear"></div>
                    <a href="user_panel/pending_ride_user.php">
                    <h4>Pending Ride</h4>
                    </a>
                </div>
            </div>            
            <div class="w3-quarter">
                <div class="w3-container w3-red w3-padding-16">
                    <div class="w3-left"><i class="fa fa-times w3-xxxlarge"></i></div>
                    <div class="w3-right">  
                    <?php
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='0' ";
                        $result = mysqli_query($con,$sql);
                        $completed_canceled=mysqli_num_rows($result);
                        echo "<h3>$completed_canceled </h3>";                          
                    ?>  
                    </div>
                    <div class="w3-clear"></div>
                    <a href="user_panel/Canceled_ride_user.php">
                    <h4>Canceled Ride</h4>
                    </a>        
                </div>
            </div>  
            <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-check-square w3-xxxlarge"></i></div>
                    <div class="w3-right">
                    <?php
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='2' ";
                        $result = mysqli_query($con,$sql);
                        $completed_canceled=mysqli_num_rows($result);
                        echo "<h3>$completed_canceled </h3>";                          
                    ?>  
                    </div>
                    <div class="w3-clear"></div>
                    <a href="user_panel/completed_ride_user.php">
                    <h4>Completed Ride</h4>
                    </a>
                </div>
            </div>        
            <div class="w3-quarter">
                <div class="w3-container w3-green w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-taxi w3-xxxlarge w3-xxxlarge"></i></div>
                    <div class="w3-right"> 
                    <?php
                        require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id'";
                        $result = mysqli_query($con,$sql);
                        $completed_canceled=mysqli_num_rows($result);
                        echo "<h3>$completed_canceled </h3>";                          
                    ?>                    
                    </div>
                    <div class="w3-clear"></div>
                    <a href="user_panel/all_ride_user.php">                    
                    <h4>All Rides</h4>
                    </a>
                </div>
            </div>
        </div>
        <div id="piechart"></div>
    </div>      
        </div>        
    </div>    
</center>

<?php 

require "user_footer.php";

}


}



?>