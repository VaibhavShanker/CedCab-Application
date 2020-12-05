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
                    echo  "<script>alert('Registration done successfully');</script>";
                    echo  "<script>alert('Please wait few mins so that admin can grand permission');window.location='index.php';</script>";
                    
                } else {
                   // echo  "<script>alert('unsuccesful')</script>";
                    echo '<p style="color:green;margin-left:30%;font-size:20px;
                    margin-top:10px">Registration Unsuccesful<p>';
                   
                   
               
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
            $error=array();
            $sql2 = "SELECT * from tbl_user";
            
            $result =$conn->query($sql2);
            if ($result->num_rows> 0) {
            while($row =$result->fetch_assoc()){
            echo $row['user_name'].'<br>';

            }
          }

        }

        function book($cab,$date,$pick,$drop,$select,$user_id,$conn)
        {              
            $user = $_SESSION['userdata']['name'];
            $user_id = $_SESSION['userdata']['userid'];         
                $sql = "INSERT INTO tbl_ride( cab_type, ride_date, pick, drop_location, total_distance, luggage, total_fare, customer_user_id)
                VALUES ('".$cab."', '".$date."', '".$pick."', '".$drop."', 100, '".$select."', 500, '".$user_id."')";
                    if ($conn->query($sql) === true) {
                        echo "<script>alert('Cab Booking successfully');window.location='book_new.php'</script>";
                        echo " <br>";                                  
                    } else {
                        echo $conn->error;
                        echo "Cab NOT Booking <br>";
                    
                    }
        }


        function Login1($username,$password,$conn)
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

                    // echo "<script>alert('Please Login to Calculate Fare If an already exists existing user, Otherwise Registration Needs');
                    // window.location='ced_register1.php';
                    // </script>";


                    //  echo "<script>alert('Confirm your booking');book.php';</script>";
                         
                     header('Location:book_alert.php');
                    //   echo "<script>alert('Confirm your booking');</script>";
                    //   echo "<p style='color:red;margin:10px 0px 0px 30%;'>Confirm your booking</p>";
          
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
       
}


    

?>