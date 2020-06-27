<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "test";



$aname = $_POST['aname']; //session_id (eg: FA16)
$bname = $_POST['bname']; //program_id (eg: bcs)
$cname = $_POST['cname']; //student_id (eg: 130)
$dname = $_POST['dname']; //course_id (e.g: 111)
$ename = $_POST['ename']; //internal marks
$fname = $_POST['fname']; //external marks
$gname = $_POST['gname']; //final marks

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
    if(!empty($dname) && !empty($cname))
	{

			//check if user and email exists sql queries
            //$checkusrid = "SELECT 	student_id course_id FROM `marks` WHERE `student_id` = '$cname' AND `course_id` = '$dname' and 'session_id' = '$aname' and 'program_id' = '$bname' ";
      // $checkcnic = "SELECT student_id,course_id FROM `student_involve` WHERE `student_id` = '$cname' 'course_id'='$dname' " ;
     $checkusrid = "SELECT student_involve.course_id,marks.student_id from 'marks' RIGHT JOIN 'student_involve' ON marks.student_id = student_involve.student_id where `student_id` = '$cname' AND `course_id` = '$dname';
       $checkcnic = "SELECT student_id,course_id FROM `student_involve` WHERE `student_id` = '$cname' 'course_id'='$dname' " ;
        $didcheckfail = true;
     
        if ($stmt1 = $conn->query($checkusrid)) {          
            $rs1 = $stmt1->num_rows;
            $stmt1->close();
        }

        if ($stmt2 = $conn->query($checkcnic)) {          
            $rs2 = $stmt2->num_rows;
            $stmt2->close();
        }

        //vertification of sql queries
        if ($rs1 > 0) 
        {
            $tempSuccess = 2;
            $didcheckfail = true;

        } elseif ($rs2 > 0) {
            $tempSuccess = 3;
            $didcheckfail = true;

        } else {
            $didcheckfail = false;
        }
		
        
        if($didcheckfail == false){
            
            //sql injection
            $sql=  "INSERT INTO `marks`(`session_id`, `program_id`, `student_id`, `course_id`, `Internal_Marks`, `Total_Marks`, `External_Marks`)
            VALUES ('$aname','$bname','$cname','$dname','$ename','$gname','$fname')";
            $regQuery = $conn->query($sql);
            
            if($regQuery){
                //successful
                header('location:addmarks.php');
            } else {
                //unsuccessful
                $tempSuccess = 4;
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