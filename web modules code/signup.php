
<?php session_start(); ?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>SIGN-UP
</title>


	<?php  session_unset(); ?>
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
	
    <h2 style="margin-left:8% ;color: white">AUGMENTED REALITY BASED STUDENT PORTAL INFORMATION SYSTEM</h2><br>
		<div class="container" style="background-color: white;  height: auto; width: 480px; opacity: 0.8; padding: 10px; border-radius: 25px;">
			<br>
			<form method="POST" action="signup_logic.php">
  
   <div class="form-group">
   <h2 style="margin-left:16%">REGISTER AS A ADMIN</h2><br><br>
    <label for="exampleFormControlInput1">USER NAME</label>
    <input type="text" class="form-control" name="aname" id="exampleFormControlInput1" required>
   <div class="form-group">
    <label for="exampleFormControlInput1">EMAIL ADDRESS</label>
    <input type="EMAIL" class="form-control" name="ename" id="exampleFormControlInput1" required>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">PASSWORD</label>
    <input type="password" class="form-control" name="pname" id="exampleFormControlInput1" required>
  </div>
  
  
  
  <button type="submit" style="margin-left: 65%;" class="btn btn-dark">CREATE ACCOUNT</button><br><br>
  
  
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