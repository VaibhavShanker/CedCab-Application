<?php
      $dis_id=$_REQUEST['dis_id'];
      $con = mysqli_connect("localhost", "root", "", "Schema");
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }

        $sql = "DELETE FROM tbl_location WHERE `id`='$dis_id' ";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Record deleted successfully');
                window.location='location.php';
                </script>";
            } else {
            echo "Error deleting record: " . mysqli_error($con);
            }

      echo "</table>";
      mysqli_close($con);
?>
