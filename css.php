<?php
            $con = mysqli_connect("localhost", "root", "", "Schema");
            if (!$con) {
              die('Could not connect: ' . mysqli_error($con));
            }

?>