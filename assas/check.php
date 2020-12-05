<head>
<title>403 Forbidden</title> 
<?php
require "admin_header.php";
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>


<p></p> 
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <i class="fa fa-exclamation-triangle fa-fw fa-fw w3-xxxlarge"></i><strong>Forbidden!</strong> Directory access is forbidden need to Login.
</div>

</body>
</html>