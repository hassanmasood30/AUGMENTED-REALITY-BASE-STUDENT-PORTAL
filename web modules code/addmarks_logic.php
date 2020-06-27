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
	

// Create connection
$conn = new mysqli($servername, $server_username, $server_password, $dbname);
// Check connection
 
if(!empty($dname) && !empty($cname))
{
	$checkcoursecode = "SELECT 	student_id course_id FROM `student_involve` WHERE `student_id` = '$cname' AND `course_id` = '$dname' and 'session_id' = '$aname' and 'program_id' = '$bname' ";
    if ($stmt1 = $conn->query($checkcoursecode)) {          
            $rs1 = $stmt1->num_rows;
            $stmt1->close();
        }
		if ($rs1 > 0) 
        {
            header('location:FAKE REC.php');
           
        }
        
        else{
			
            if ($conn->connect_error)
            {
    //echo" failed to connect".mysqli_connect_error(); 
            }      

                 $sql=  "INSERT INTO `marks`(`session_id`, `program_id`, `student_id`, `course_id`, `Internal_Marks`, `Total_Marks`, `External_Marks`)
                 VALUES ('$aname','$bname','$cname','$dname','$ename','$gname','$fname')";

                 $regQuery = $conn->query($sql);
            
                 if($regQuery)
                 {
                header('location:New Rec2.php');
             
                } 
               else 
               {
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