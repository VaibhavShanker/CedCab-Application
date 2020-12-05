<?php
      $dis_id=$_REQUEST['dis_id'];
      $con = mysqli_connect("localhost", "root", "", "Schema");
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }

        $sql = "DELETE FROM tbl_ride WHERE `ride_id`='$dis_id' ";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Ride Canceled Successfully');
                window.location='../user_panel/pending_ride_user.php';
                </script>";
            } else {
            echo "Error deleting record: " . mysqli_error($con);
            }

      echo "</table>";
      mysqli_close($con);
?>
