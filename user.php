<?php
session_start();

require 'Dbconnect.php';
class user
{
    public $username;
    public $password;
    public $confirmpassword;
    public $userid;
    public $name;
    public $date;
    public $mobile;
    public $isblock;
    public $isadmin;

        function Login($username,$password,$conn)
        {
        $error=array();

            if ($username=="" || $password=="") {
            $error[]=array("id"=>'form','msg'=>"Field cant be empty");
            }
            if (count($error)==0) {
            $sql = "SELECT * FROM `tbl_user` WHERE `user_name`='".$username."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {         

            if ($row['user_name']==$username && $row['password']==$password && $row['isblock']==2) {
                if ($row['is_admin']==0) {
                    $_SESSION['userdata']=array('userid'=>$row['user_id'],
                    'username'=>$row['user_name'],'name'=>$row['name']);  
                    
                    header('Location:admin.php'); 
                } else if($row['is_admin']==1){

                    $_SESSION['userdata']=array('userid'=>$row['user_id'],
                    'username'=>$row['user_name'],'name'=>$row['name']);  
                    header('Location:homeuser.php');
                }
            } else {
              echo "<p style='color:red;margin:10px 0px 0px 30%;'>Username or Password does'nt match</p>";
            }
            }
            } 
            } 
            else {
            foreach ($error as $err) {
            $display=$err['msg'];
            }
            }

        }


        function register($username,$password,$name,$confirmpassword,$mobile,$date,$conn)
        {       
            $error=array();
            if ($username=="" || $password=="" || $confirmpassword=="" || $name=="" ||$mobile=="") {
                $error[]=array("id"=>'form','msg'=>"Field cant be empty");
            }
            if ($password!=$confirmpassword) {
                $error[]=array("id"=>'form','msg'=>"Password does not matches ");
            }
            $sql1 = "SELECT * FROM tbl_user WHERE user_name='".$username."'";
            $result = $conn->query($sql1);

            if ($result->num_rows > 0) {
                $error[]=array("id"=>'form','msg'=>"Username/Email already present");
            }             

            if (count($error)==0) {
                //$password=md5($password);

                    $sql = "INSERT INTO tbl_user (user_name, name, password, mobile, isblock, dateofsignup, is_admin)
                    VALUES ('".$username."','".$name."','".$password."','".$mobile."',1,'".$date."',1)";
                if ($conn->query($sql) === true) {
                    // echo '<p style="color:green;margin-left:30%;font-size:20px;
                    // margin-top:10px">Registration done successfully,Please wait few mins so that admin can grand permission<p>';
                    echo  "<script>alert('Registration done successfully, Please wait few mins so that admin can grand permission')</script>";
                } else {
                   // echo  "<script>alert('unsuccesful')</script>";
                    echo '<p style="color:green;margin-left:30%;font-size:20px;
                    margin-top:10px">unsuccesful<p>';
                   
               
                }
            } else {
                foreach ($error as $err) {
                    $display=$err['msg'];
                }
            }

        }

        function select($userid)
        {
            $array = array();
            $query = "SELECT * FROM ".$userid."";
            $result = mysqli_query($this->conn, $query);
            while($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }
                return $array;
        }

        function update()
        {
           
            $sql2 = "SELECT * from tbl_user";
            
            $result =$conn->query($sql2);
            if ($result->num_rows> 0) {
            while($row =$result->fetch_assoc()){
            echo $row['user_name'].'<br>';

            }
          }

        }


























        
}


    

?>