<?php
      $user_id=$_REQUEST['id'];
      require 'Dbconnect.php';
      require 'css.php';
      $sql = "UPDATE tbl_user SET `isblock`='0' WHERE `user_id`='$user_id' ";
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

