<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "test";

        $aname = $_POST['aname'];
        $bname = $_POST['bname'];
        $cname = $_POST['cname'];
        $dname = $_POST['dname'];




      $tempID = 0;
    $tempSuccess = 0;
	$rs1=0;
	

// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);
// Check connection
if ($conn->connect_error) {
    //echo" failed to connect".mysqli_connect_error(); 
} 
if(!empty($dname) && !empty($cname))
{
	$checkcoursecode = "SELECT 	student_id course_id FROM `student_involve` WHERE `student_id` = '$cname' AND `courseid` = '$dname'";
	if ($stmt1 = $conn->query($checkcoursecode)) {          
            $rs1 = $stmt1->num_rows;
            $stmt1->close();
        }
		if ($rs1 > 0) 
        {
            header('location:FAKE REC.php');
           
        }else
		{
			
             $sql=  "INSERT INTO `student_involve`(`student_id`, `program_id`, `sesstion_id`, `course_id`) VALUES ('$cname','$bname','$aname','$dname')";
            $regQuery = $conn->query($sql);
            
            if($regQuery){
                header('location:New Rec1.php');
             
            } else {
                //unsuccessful
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