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
                $sql="SELECT * FROM tbl_user WHERE isblock=2 AND is_admin='1'";
                $result = mysqli_query($con,$sql);
                    echo "<table class='table table-striped table-dark'>
                    <tr>
                    <th>User_id</th>
                    <th>User_name</th>
                    <th>Name</th>
                    <th>Date-Time</th>
                    <th>Mobile No. </th>
                    <th>States. </th>
                    <th>Action. </th>
                    </tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['user_name'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['dateofsignup'] . "</td>"; 
                    echo "<td>" . $row['mobile'] . "</td>"; 
                    echo "<td>" . $row['isblock'] . "</td>";
                    echo "<td><a  class='btn btn-primary' href=block_user.php?id=".$row["user_id"].">Block</a> </td>"; 
                    echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($con);
            ?>
  </body>
</html>