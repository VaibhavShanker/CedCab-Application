<!DOCTYPE html>
<html>
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
    </head>
    <body>

        <?php
          require 'Dbconnect.php';
          require 'css.php';
            mysqli_select_db($con,"ajax_demo");
            $sql="SELECT * FROM tbl_ride WHERE status=1";
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
                <th>Action. </th>
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
                  echo "<td><a>Pending</a></td>"; 
                  echo "<td>" . $row['customer_user_id'] . "</td>"; 
                  echo "<td><a  class='btn btn-primary' href=approved_ride.php?id=".$row["ride_id"].">Approved_Ride</a> </td>";                   
                  echo "</tr>";
                }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>