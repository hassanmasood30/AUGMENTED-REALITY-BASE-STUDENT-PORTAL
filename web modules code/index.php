<?php 
session_start();

?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>LOGIN
</title>
<style>
.font{
float:left;
}
.font1{
float:right;

}


.myBody{
		background-image: url(wallpaper-723585.jpg);
		  background-size: cover;
	}
	.shadow{
	box-shadow: 10px 10px 5px grey;
}
</style>
</head>
<body>
<div class="container-fluid" >
  
<div class="row align-items-center myBody "  style="height: 100vh;">
    <div class="col">
	
	  <h1 style="margin-left:1% ;color: white">AUGMENTED REALITY BASED STUDENT PORTAL INFORMATION SYSTEM</h1><br><br>
		<div class="container" style="background-color: white;  height: auto; width: 480px; opacity: 0.8; padding: 10px; border-radius: 25px;">
			<br>
			
			<form method="POST" action="login_logic.php">
  
   <div class="form-group">
   <?php
if((isset($_SESSION['isLogin']))){
	if($_SESSION['isLogin']=='FALSE'){
	echo '<div class="alert alert-danger" role="alert">';
	echo 'AUTHENTICATION FAILED!';
	echo '</div>';

	session_unset();
}
}


   ?>
   <h2 style="margin-left:20%">LOGIN AS A ADMIN</h2><br><br>
    <label for="exampleFormControlInput1">User Name</label>
    <input type="text" class="form-control" name="uname" id="exampleFormControlInput1" required>
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleFormControlInput1" required>
  </div><BR>
<a href="signup.php"<button type="button" STYLE="MARGIN-LEFT:50%"class="btn btn-dark">NEW ACCOUNT</button></a>
<button type="submit" STYLE="MARGIN-LEFT:3%" class="btn btn-dark">LOGIN</button><br><br><br><br>
  
</form>
		</div>
	</div>
	</div>
	</div>
	  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




</body>
<html>