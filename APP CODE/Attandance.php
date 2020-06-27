<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


 $studentId = $_REQUEST["studentIdPost"];
 $programId = $_REQUEST["programIdPost"];
 $SessionId = $_REQUEST["SessionIdPost"]; 
 



$Cid;
 //Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT DISTINCT `course_id` FROM `attendences` WHERE `student_id` = '$studentId' AND `session_id` = '$SessionId' AND `program_id` = '$programId'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
         $Cid =  "".$row["course_id"]."";
		 $Cname = "SELECT `course_name` FROM `course` WHERE `course_id` = '$Cid'";
		  $Courseresultt = $conn->query($Cname);
		  if ($Courseresultt->num_rows > 0)
		  {
				  while($row = $Courseresultt->fetch_assoc()) {
                  echo "".$row["course_name"]."";
				  
           }
			  echo ",";
		  }
		 $sqll = "SELECT Statuss FROM `attendences`WHERE session_id= '$SessionId' AND program_id='$programId' AND course_id='$Cid ' AND student_id='$studentId'";
		 $resultt = $conn->query($sqll);
if ($resultt->num_rows > 0) {
    while($row = $resultt->fetch_assoc()) {
       echo "".$row["Statuss"]."";
		echo ",";
    }
	
} 
		 
		 echo "|";
     }
 } 




$conn->close();
?>



