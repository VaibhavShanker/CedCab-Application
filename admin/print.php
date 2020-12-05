<!DOCTYPE html>
<html>
<title>Invoice Print</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="../img/rsz_logo1.png">
                        </div>
                        <div class="col-md-6 text-right">                 
                            <p class="font-weight-bold mb-1">Rides Deteals</p>
                            <a href="javascript:window.print()">Click to Print Invoice</a><br>
                            <a href="all_users.php">Go Back</a><br>
                            <!-- <button onclick="goBack()"></button> -->
                           
                        </div>
                    </div>  
                    <hr class="my-5">
                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                        </div>
                        <div class='col-md-6 text-right'>
                            <?php 
                                    $id=$_REQUEST["id"];
                                    require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE user_id='$id'";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result)) {                                          
                                            echo "<p class='font-weight-bold mb-4'>Custmer Details</p>";
                                            echo "<p class='mb-1'><span class='text-muted'>Custmer Id: </span>" . $row['user_id'] ."</p>";
                                            echo "<p class='mb-1'><span class='text-muted'>Custmer Id: </span>" . $row['name'] ."</p>";
                                            echo "<p class='mb-1'><span class='text-muted'>Date of SignUp: </span>". $row['dateofsignup'] ."</p>";
                                    }
                            ?>
                    </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Cab type. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Date. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">From. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">To. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Distance. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Luggage. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Fare. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">States. </th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Customer. </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $id=$_REQUEST["id"];
                                        require 'Dbconnect.php';
                                        require 'css.php';
                                        mysqli_select_db($con,"ajax_demo");
                                        $sql="SELECT * FROM tbl_ride WHERE `customer_user_id`='$id'";
                                        $result = mysqli_query($con,$sql);
                                                while($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['ride_id'] . "</td>";
                                                echo "<td>" . $row['cab_type'] . "</td>";
                                                echo "<td>" . $row['ride_date'] . "</td>";
                                                echo "<td>" . $row['from_p'] . "</td>";
                                                echo "<td>" . $row['to_p'] . "</td>"; 
                                                echo "<td>" . $row['total_distance'] . "</td>"; 
                                                echo "<td>" . $row['luggage'] . "</td>"; 
                                                echo "<td>" . $row['total_fare'] . "</td>";
                                                echo "<td>" . $row['status'] . "</td>"; 
                                                echo "<td>" . $row['customer_user_id'] . "</td>";                                                                   
                                                echo "</tr>";
                                                }
                                  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">79,560</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

            <?php
               
                mysqli_close($con);
            ?>

    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</div>
</html>