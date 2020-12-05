<select class="form-control-plaintext col-sm-9 mr-1 ml-4 drpdown" id="drp" name="Drop">
            
            <?php

                if(isset($_SESSION['d'])) {

                    $sql2="SELECT * from tbl_location WHERE is_available=1";
                    $result2=$connn->con->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row2= $result2->fetch_assoc()) {
                            if($_SESSION['d']==$row2['name']) {                       

                                $sql1="SELECT * from tbl_location WHERE is_available=1";
                                $result=$connn->con->query($sql1);
                                if ($result->num_rows > 0) {
                                    while ($row= $result->fetch_assoc()) {
                                        if($row['name']!=$_SESSION['d']) {
                                            echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                                        } else if($row['name']==$_SESSION['d']) {
                                            echo '<option value="'.$_SESSION['d'].'" selected>'.$_SESSION['d'].'</option>';
                                        }
                                    
                                    }
                                }      
                            }
                        }
                    }
                } else {
                    echo '<option value="" selected disabled hidden>Select Drop Location</option>';
                    $sql1="SELECT * from tbl_location WHERE is_available=1";
                        $result=$connn->con->query($sql1);
                        if ($result->num_rows > 0) {
                            while ($row= $result->fetch_assoc()) {
                                
                                echo '<option value="'.$row['name'].'" >'.$row['name'].'</option>';
                            }
                        }
                }

            ?>


                
            </select>


            