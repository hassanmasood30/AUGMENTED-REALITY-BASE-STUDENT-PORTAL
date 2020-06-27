<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "test";

$aname = $_POST['aname']; //session_id (eg: FA16)
$bname = $_POST['bname']; //program_id (eg: bcs)
$cname = $_POST['cname']; //section
$dname = $_POST['dname']; //course_id (e.g: 111)
$ename = $_POST['ename']; //day_id
$fname = $_POST['fname']; //room_id
$gname = $_POST['gname']; //slot_id

//$courseid = test_input($_POST["courseidPost"]);//"005";
//$studentId = test_input($_POST["studentIdPost"]);//"Shahid";


      $tempID = 0;
    $tempSuccess = 0;
	$rs1=0;
	

// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);
// Check connection
if ($conn->connect_error) {
    //echo" failed to connect".mysqli_connect_error(); 
} 
if(!empty($aname) && !empty($bname) && !empty($cname) && !empty($dname) && !empty($ename) && !empty($fname) &&!empty($gname))
{
	$checkcoursecode = "SELECT 	room_id,slot_id,day_id FROM `timetable` WHERE `room_id` = '$fname' AND `slot_id` = '$gname' AND `day_id` = '$ename'";
	if ($stmt1 = $conn->query($checkcoursecode)) {          
            $rs1 = $stmt1->num_rows;
            $stmt1->close();
        }
		if ($rs1 > 0) 
        {
            header('location:FAKE REC.php');	
           
        }else
		{
        
             $sql="INSERT INTO `timetable`(`session_id`, `program_id`, `room_id`, `slots_id`, `course_id`, `day_id`, `Section`)
              VALUES ('$aname','$bname','$fname','$gname','$dname','$ename','$cname')";
            $regQuery = $conn->query($sql);
            
            if($regQuery){
                //successful
                header('location:New Rec6.php');
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