<?php
session_start();

$aname = $_POST['aname'];
$pname = $_POST['pname'];
$ename = $_POST['ename'];


	$db_username = 'root';
	$db_password = '';
	$dsn = 'mysql:host=localhost;dbname=test';


	try
	{
		$sql = "INSERT INTO admin VALUES ('$aname','$pname','$ename')";
		$db = new PDO($dsn, $db_username, $db_password);

		$row = $db->exec($sql);

		header('location:index.php');


	}catch(Exception $e){
		$err = $e->getMessage();
	}


	if(isset($err)){
		echo $err;
	}


?>