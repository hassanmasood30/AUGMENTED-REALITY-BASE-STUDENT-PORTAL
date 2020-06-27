<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$studentId = $_REQUEST["studentIdPost"];
$programId = $_REQUEST["programIdPost"];
$SessionId = $_REQUEST["SessionIdPost"]; 
 

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `marks` WHERE `student_id` = '$studentId' AND `program_id` = '$programId' AND `session_id` = '$SessionId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    while($roww = $result->fetch_assoc()) 
	{
		$Cid =  "".$roww["course_id"]."";
		 $Cname = "SELECT `course_name` FROM `course` WHERE `course_id` = '$Cid'";
		  $Courseresultt = $conn->query($Cname);
		  if ($Courseresultt->num_rows > 0)
		  {
				  while($row = $Courseresultt->fetch_assoc()) {
                  echo "".$row["course_name"]."";
				  
           }
			  echo ",";
		  }
		echo "".$roww["Internal_Marks"].",".$roww["External_Marks"].",".$roww["Total_Marks"]."";
		echo "|";
    }

} 



$conn->close();
?>



