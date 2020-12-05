<!-- <!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("p").toggle();
  });
});
</script>
</head>
<body>

<button>Toggle between hiding and showing the paragraphs</button>

<p>This is a paragraph with little content.</p>
<p>This is another small paragraph.</p>

</body>
</html> -->




<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<script>
                  function loadDoc1() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "p_ride.php", true);
                    xhttp.send();
                  }
                  function loadDoc1() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "p_ride.php", true);
                    xhttp.send();
                  }
                  function loadDoc1() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "pending_ride.php", true);
                    xhttp.send();
                  }
                  

                  </script>

<div class="container">

  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Filter
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="loadDoc1()">Pending Ride</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="loadDoc2()">Completed Ride</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="loadDoc3()">Canceled Ride</a></li>
           <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>    
    </ul>
  </div><br>

<div id="display" >
          </div>
  </div>

<script>
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});
</script>



</body>
</html>