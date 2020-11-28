    <?php
      $user_id=$_REQUEST['id'];
      $con = mysqli_connect("localhost", "root", "", "Schema");
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }
      $sql = "UPDATE tbl_user SET `isblock`='2' WHERE `user_id`='$user_id' ";
        if ($con->query($sql) === TRUE) {
          echo "<script>alert('Record updated successfull');
          window.location='users.php';
          </script>";
        } else {
          echo "Error updating record: " . $con->error;
        }
      echo "</table>";
      mysqli_close($con);
    ?>
