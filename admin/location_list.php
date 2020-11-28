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
              $sql="SELECT * FROM tbl_location";
              $result = mysqli_query($con,$sql);
                  echo "<table class='table table-striped table-dark'>
                  <tr>
                  <th>Id. </th>
                  <th>Name. </th>
                  <th>Distance. </th>
                  <th>Available. </th>
                  <th>Delete. </th>
                  </tr>";
              while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['distance'] . "</td>";
                    echo "<td>" . $row['is_available'] . "</td>"; 
                    echo "<td> <a  class='btn btn-primary' href=delete.php?dis_id=".$row["id"].">Delete</a> </td>"; 
                    echo "</tr>";
              }
      ?>
</body>
</html>

