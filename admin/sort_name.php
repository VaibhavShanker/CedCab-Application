<?php
                require 'Dbconnect.php';
                require 'css.php';
                  mysqli_select_db($con,"ajax_demo");
                  $sql="SELECT * FROM tbl_user WHERE is_admin=1 ORDER BY name ASC";
                  $result = mysqli_query($con,$sql);
                  echo " <li><a class='dropdown-toggle btn btn-primary' data-toggle='dropdown' href='#'>Short By </span></a>
                            <ul class='dropdown-menu'>
                            <li><a href='namef.php'>Short by Name </a></li>
                            <li><a href='user_datef.php'>Short by Date</a></li>
                            </ul>
                        </li> <br>";
                  echo "<table class='table table-striped table-dark'>
                        <tr>
                        <th>User_id. </th>
                        <th>User_name. </th>
                        <th>Name. </th>
                        <th>Date-Time. </th>
                        <th>Mobile No. </th>
                        <th>Invoice. </th>
                        </tr>";
                  while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['dateofsignup'] . "</td>"; 
                        echo "<td>" . $row['mobile'] . "</td>"; 
                        echo "<td> <a  class='btn btn-primary' href=print.php?id=".$row["user_id"].">Invoice</a> </td>";                 
                        echo "</tr>";
                      }
                      echo "</table>";
                  mysqli_close($con);
              ?>