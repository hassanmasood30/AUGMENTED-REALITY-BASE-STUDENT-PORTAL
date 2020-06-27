	<?php
	
	session_start();

		$uname = $_POST['uname'];
		$password = $_POST['password'];

		$db_username = 'root';
		$db_password = '';
		$dsn = 'mysql:host=localhost;dbname=test';


	try
	{
		$sql = "SELECT * FROM admin where user_name = '$uname' AND password = '$password'";
		$db = new PDO($dsn, $db_username, $db_password);

		$result = $db->query($sql);

		$row = $result->fetch();

		if($row){
			$_SESSION['isLogin'] = 'TRUE';
			$_SESSION['user_name']= $row['user_name'];
			header('location:HOMEPAGE.php');
			return;
		}else{
			$_SESSION['isLogin'] = 'FALSE';
			header('location:index.php');
			return;
		}

	}catch(Exception $e){
		$err = $e->getMessage();
	}


	if(isset($err)){
		echo $err;
	}

	?>