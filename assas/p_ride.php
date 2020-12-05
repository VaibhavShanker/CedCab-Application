
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
                window.onunload = function () { null }
    </script>
  

        
            <center><br>                        
                <?php
                    require 'Dbconnect.php';
                    require 'css.php';
                        mysqli_select_db($con,"ajax_demo");
                        $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='1' ";
                        // echo $user_id;
                        $result = mysqli_query($con,$sql);
                        // echo " <li><a class='dropdown-toggle btn btn-primary' data-toggle='dropdown' href='#'>Ride </span></a>
                        //             <ul class='dropdown-menu'>
                        //                 <li><a href='date_f.php'>Short by Date</a></li>
                                    
                        //                 <li><a href='distancef.php'>Short by Distance</a></li>
                        //             </ul>
                        //         </li>";
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
                            <th>Canceled Ride. </th>               
                            </tr>";
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
                            echo "<td> <a>Pending</a>  </td>";
                            echo "<td>" . $row['customer_user_id'] . "</td>";
                            echo "<td> <a  class='btn btn-primary' href=can_ride.php?dis_id=".$row["ride_id"].">Canceled Ride. </a> </td>"; 
                            echo "</tr>";
                            }
                        echo "</table>";
                        mysqli_close($con);
                    ?>                        
            </center>
        </div>
    </div> 
 