<?php
  session_start();

  require 'Dbconnect.php';
  $connn=new Dbconnect();

    class ApproveReject {

            function approv($a,$connn) {       
                $sql1="SELECT * from tbl_user WHERE isblock=1";
                $result=$connn->con->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        echo $row['user_name'].'<br>';    
                        $sql2="UPDATE tbl_user SET isblock=0 WHERE user_id=$a";
                        if($connn->conn->query($sql2)===true) {
                        }    
                    }
                }
            }
            
            function reject($b,$connn) {         
                $sql1="SELECT * from tbl_user WHERE isblock=0";
                $result=$connn->conn->query($sql1);
                if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {   
                        $sql2="UPDATE tbl_user SET isblock=1 WHERE user_id=$b";
                        if($connn->conn->query($sql2)===true) {                                    
                        }   
                    }
                }
            }   
    }

   
        $sql1="SELECT * from tbl_user WHERE is_admin=0";
        $result=$connn->conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {

                if(isset($_POST[$row['user_id']."yes"])) {
            
                    $y=new ApproveReject();
                    $y->approv($row['user_id'],$connn);                    
                }

                if(isset($_POST[$row['user_id']."no"])) {
                    
                    $n=new ApproveReject();
                    $n->reject($row['user_id'],$connn);
                }
            }
        }

?>
</body>
</html>