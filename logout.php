<?php


if (isset($_SESSION['tbl_user'])) {//p


    unset($_SESSION['tbl_user']);//p
    session_destroy();//p

} else {
    
    echo "<script>alert('Member logout, please login again to continue');
    window.location='ced_taxi_index.php';
    </script>";
}
?>  