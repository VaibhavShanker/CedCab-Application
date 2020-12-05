<input type="submit" id="submitButton"  disabled="disabled" />

Hide   Copy Code
<script type="text/javascript">
    window.onload=function() {
      setTimeout(function() {
        document.getElementById('submitButton').disabled = false;
      }, 5000); 
    }
</script>


<!DOCTYPE html>
<html>
<head>
    <title>Disable button using disabled property</title>
</head>
<body>
    <p>Click the button to submit data!</p>
    <p>
    	<input type='submit' value='Submit' id='btClickMe' 
            onclick='save(); this.disabled = true;' />
    </p>
    <p id="msg"></p>
</body>
<script>
    function save() {
        var msg = document.getElementById('msg');
        msg.innerHTML = 'Data submitted and the button disabled ☺';
    }
</script>
</html>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $($p1).toggle();
  });
});
</script>
</head>
<body>

<button>Toggle between hiding and showing the paragraphs</button>

<p>This is a paragraph with little content.</p>
<p id="p1">This is another small paragraph.</p>

</body>
</html>





<?php

// function switchVisible() {
//   if (document.getElementById('Div1') !== undefined) {
//     if (document.getElementById('Div1').style.display = 'Block') {
//       document.getElementById('Div1').style.display = 'none';
//       document.getElementById('Div2').style.display = 'Block';
//     } else {
//       document.getElementById('Div1').style.display = 'Block';
//       document.getElementById('Div2').style.display = 'none';
//     }
//   }
// }
// ?>
// #Div2 {
//   display: none;
// }
// <input id="Button1" type="button" value="" onclick="javascript:switchVisible();" /><!DOCTYPE html>
<html>
<body>

<p>Click on the button below. The input field will tell you when two, four, and six seconds have passed.</p>

<button onclick="timedText()">Sibb</button>
<input type="text" id="txt">

<script>
function timedText() {
  var x = document.getElementById("txt");
  setTimeout(function(){ x.value="1 seconds" }, 1000);
  setTimeout(function(){ x.value="2 seconds" }, 2000);
  setTimeout(function(){ x.value="4 seconds" }, 4000);
  setTimeout(function(){ x.value="6 seconds" }, 6000);
}
</script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>
</head>
<body>

<p>If you click on the "Hide" button, I will disappear.</p>

<button id="hide">Hide</button>
<button id="show">Show</button>

</body>
</html>