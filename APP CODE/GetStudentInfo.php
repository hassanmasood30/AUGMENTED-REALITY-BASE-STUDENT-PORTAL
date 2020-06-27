<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$Sname = $_REQUEST["SNamePost"];
//$Sname =  "Hassan Masood";
//$Sname = "Nouman Mureed";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `student` WHERE `student_name` = '$Sname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		

		 $Cname = "SELECT  `course_id` FROM `student_involve` WHERE `student_id` = '".$row["student_id"]."' AND `program_id` = '".$row["program_id"]."' AND `session_id` = '".$row["session_id"]."'";
		  $Courseresultt = $conn->query($Cname);
		  if ($Courseresultt->num_rows > 0)
		  {
				  while($roww = $Courseresultt->fetch_assoc()) {
					  
					  $Cnamee = "SELECT  `course_name` FROM `course` WHERE `course_id` = '".$roww["course_id"]."'";
		              $CourseNameResult = $conn->query($Cnamee);
					  if ($CourseNameResult->num_rows > 0)
		  {
			  while($rww = $CourseNameResult->fetch_assoc())
			  {
				  echo "".$rww["course_name"]."";
				  echo ",";
			  }
		  }
					  
				  
           }
			  echo "|";
		  }
		
		
		
		
		
        echo "".$row["student_name"].",".$row["student_f_name"].",".$row["student_id"].",".$row["program_id"].",".$row["session_id"].",".$row["student_cnic"]."";
		//echo ",";
    }
} 

$conn->close();
?>



