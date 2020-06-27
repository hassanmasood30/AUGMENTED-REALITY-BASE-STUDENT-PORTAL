<?php
$aname = $_POST['aname'];
$bname = $_POST['bname'];
$cname = $_POST['cname'];
$dname = $_POST['dname'];
$ename = $_POST['ename'];
$fname = $_POST['fname'];
$gname = $_POST['gname'];


	$db_username = 'root';
	$db_password = '';
	$dsn = 'mysql:host=localhost;dbname=test';


	try
	{
		
        $sql = "UPDATE `marks` SET `Internal_Marks`='$ename',`Total_Marks`='$gname',`External_Marks`='$fname' WHERE student_id ='$cname' and course_id= '$dname' ";
        
		
		$db = new PDO($dsn, $db_username, $db_password);

		$row = $db->exec($sql);
		if($row){
		header('location:New Rec3.php');
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