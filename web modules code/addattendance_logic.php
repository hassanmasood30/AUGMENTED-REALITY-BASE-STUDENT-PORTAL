<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "test";

        $aname = $_POST['aname']; //session_id (eg: FA16)
        $bname = $_POST['bname']; //program_id (eg: bcs)
        $cname = $_POST['cname']; //student_id (eg: 130)
        $dname = $_POST['dname']; //course_id (e.g: 111)
        $ename = $_POST['ename']; // date
        $fname    = implode(",",$_POST['fname']); // statusss

      $tempID = 0;
    $tempSuccess = 0;
	$rs1=0;
	

// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);
// Check connection
 
if(!empty($dname) && !empty($cname) && !empty($fname))
{
	$checkcoursecode = "SELECT DISTINCT `course_id` FROM `attendences` WHERE `student_id` = '$studentId' AND `session_id` = '$SessionId' AND `program_id` = '$programId'";
	if ($stmt1 = $conn->query($checkcoursecode)) {          
            $rs1 = $stmt1->num_rows;
            $stmt1->close();
        }
		if ($rs1 > 0) 
        {
            header('location:FAKE REC.php');
           
        }else
		{
			
     if ($conn->connect_error) {
    //echo" failed to connect".mysqli_connect_error(); 
}        $sql=  "INSERT INTO `attendences`(`student_id`, `session_id`, `program_id`, `course_id`, `Dates`, `Statuss`)
                 VALUES ('$cname','$aname','$bname','$dname','$ename','$fname')";

            $regQuery = $conn->query($sql);
            
            if($regQuery){
                header('location:New Rec4.php');
             
            } else {
                header('location:FAKE REC.php');
            }
		}
}
else
{
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