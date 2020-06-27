<?php
$aname = $_POST['aname'];
$bname = $_POST['bname'];
$cname = $_POST['cname'];
$dname = $_POST['dname'];
$ename = $_POST['ename'];
$fname    = implode($_POST['fname']);


	$db_username = 'root';
	$db_password = '';
	$dsn = 'mysql:host=localhost;dbname=test';


	try
	{
        $sql = "UPDATE `attendences` SET `Statuss`='$fname' WHERE student_id ='$cname' and course_id= '$dname' and Dates = '$ename' ";
        
		
		$db = new PDO($dsn, $db_username, $db_password);

		$row = $db->exec($sql);
		if($row){
		header('location:New REC5.php');
		}
		else
		{
		header('location:FAKE REC.php');	
		}

	}catch(Exception $e){
		$err = $e->getMessage();
	}


	if(isset($err)){
		echo $err;
	}


?>