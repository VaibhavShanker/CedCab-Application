<html>
          <title>Admin Dashboard</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <style>
          html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
          </style>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              
              ['Rides', <?php    require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_ride";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo $count;  ?> ],
              ['User',  <?php    require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_user WHERE is_admin='1'";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo $count; ?> ],              
              ['Location',   <?php require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_location";
                                    $result = mysqli_query($con,$sql);
                                    $count=mysqli_num_rows($result);
                                    echo $count;  ?>  ], 
              
              ]);
              var options = {'title':'Admin Dashboard', 'width':1210, 'height':400};
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
            </script>
                     <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }
                
             </script>