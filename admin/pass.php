<?php
      $user_id=$_REQUEST['id'];
      require "css.php";
      $errors=array();
      $sql = "UPDATE tbl_user SET `password`='hello' WHERE `user_id`='$user_id' ";
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Password Updated successfully');
            window.location='account.php';
            </script>";
        } else {
          echo "Error updating record: " . $con->error;
        }
      
      mysqli_close($con);
?>