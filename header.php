<!doctype html>
<html lang="en">    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="ced_taxi.css"> 
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
        <title>Ced Cab!</title> 
        
            <script>
                $(function () {
                $("#select3").change(function () {
                    if ($(this).val() == 1) {
                        $("#select4").attr("disabled", "disabled");
                        $("#select4").attr("placeholder", "Luggage Inavailable");
                    } else {
                        $("#select4").removeAttr("disabled");
                        $("#select4").attr("placeholder", "Enter the Luggage Weight");
                        $("#select4").focus();
                    }
                });
                $("#btnn").click(function (e) {
                    e.preventDefault();
                    var a = $("#select1").val();
                    var b = $("#select2").val();
                    var c = $("#select3").val();
                    var d = $("#select4").val();
                    console.log(a, b, c, d);
                    $.ajax({                
                        url: 'ced_cal.php',
                        type: "POST",                
                        data: {PICKUP: a, DROP: b, cab: c, Luggage: d},
                        success: function (result) {
                            // alert(result);
                        $('#table').append(result);                   
                        },
                        error: function () {
                            alert("error");
                        }
                    });
                });        
                });

                function myFunction() {
                    var x = document.getElementById("myDIV");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                    }
            </script>  
                        <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null }               
             </script>        
    </head>

     