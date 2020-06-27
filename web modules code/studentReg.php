<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "test";



$aname = $_POST['aname'];
$bname = $_POST['bname'];
$cname = $_POST['cname'];
$dname = $_POST['dname'];
$ename = $_POST['ename'];
$fname = $_POST['fname'];
$gname = $_POST['gname'];
$hname = $_POST['hname'];

      $tempID = 0;
    $tempSuccess = 0;
	$rs1=0;
	$rs2=0;

// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);
// Check connection
if ($conn->connect_error) {
    //echo" failed to connect".mysqli_connect_error(); 
} 
	if(!empty($cname )&& !empty($dname) && !empty($ename) && !empty($fname) && !empty($gname) && !empty($hname))
	{

			//check if user and email exists sql queries
        $checkusrid = "SELECT student_id FROM `student` WHERE `student_id` = '$cname'" ;
      
        $didcheckfail = true;
     
        if ($stmt1 = $conn->query($checkusrid)) {          
            $rs1 = $stmt1->num_rows;
            $stmt1->close();
        }

        //vertification of sql queries
        if ($rs1 > 0) 
        {
            $didcheckfail = true;
            header('location:FAKE REC.php');

        }
        else {
            $didcheckfail = false;
        }
		
        
        if($didcheckfail == false){
            
            //sql injection
                   $sql = "INSERT INTO student (student_id, student_name, student_f_name, student_cell_no, student_address,program_id, session_id,section )
                    VALUES ('".$cname."', '".$ename."', '".$fname."','".$gname."','".$hname."','".$bname."','".$aname."','".$dname."')";
               
                   $regQuery = $conn->query($sql);
            
            if($regQuery){
                //successful
                header('location:New Rec.php');
            } else {
                //unsuccessful
                header('location:FAKE REC.php');
            }

	}
}else
	{
		//"register info wrong";
		$tempSuccess = 0;
	}

     echo $tempSuccess;
		function test_input($data) 
		{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strtolower($data);
        return $data;
		}

$conn->close();
?>