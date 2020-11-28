<?php
      $ride_id=$_REQUEST['id'];
      $con = mysqli_connect("localhost", "root", "", "Schema");
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }
      $sql = "UPDATE tbl_ride SET `status`='0' WHERE `ride_id`='$ride_id' ";
        if ($con->query($sql) === TRUE) {
          echo "<script>alert('Record updated successfull');
          window.location='ride.php';
          </script>";
        } else {
          echo "Error updating record: " . $con->error;
        }
      echo "</table>";
      mysqli_close($con);
?>
