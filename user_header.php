<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link rel="stylesheet" href="ced_taxi.css">  
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <!-- ajax -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://kit.fontawesome.com/4b2ee26aaa.js" crossorigin="anonymous"></script>
            <title>User Dashboard!</title> 
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Pending',   <?php require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='1' ";
                                    $result = mysqli_query($con,$sql);
                                    $completed_canceled=mysqli_num_rows($result);
                                    echo $completed_canceled; ?> ], 
                ['Canceled',  <?php require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='0' ";
                                    $result = mysqli_query($con,$sql);
                                    $count_canceled=mysqli_num_rows($result);
                                    echo $count_canceled; ?> ],                          
                ['Completed', <?php require 'css.php';
                                    mysqli_select_db($con,"ajax_demo");
                                    $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id' AND status='2' ";
                                    $result = mysqli_query($con,$sql);
                                    $completed_canceled=mysqli_num_rows($result);
                                    echo $completed_canceled; ?> ], 
                // ['All Ride',  <?php require 'css.php';
                //                     mysqli_select_db($con,"ajax_demo");
                //                     $sql="SELECT * FROM tbl_ride WHERE customer_user_id='$user_id'";
                //                     $result = mysqli_query($con,$sql);
                //                     $completed_canceled=mysqli_num_rows($result);
                //                     echo $completed_canceled ; ?>  ],
                ]);
                var options = {'title':'User Dashboard', 'width':1210, 'height':400};
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
                }
            </script>
            <!-- <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }
                
             </script> -->
    </head>