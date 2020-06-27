<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$SessionId = $_REQUEST["SessionIdPost"];
`//$SessionId = "FA16";
// Create connection
$Counter = 0;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `timetable` WHERE session_id='$SessionId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    while($row = $result->fetch_assoc()) {
		
		if($Counter == 0)
		{
			$Counter++;
			
			echo "".$row["Section"]."";
			echo ",";
			
		}
		
		
		echo "".$row["day_id"].",".$row["slots_id"].",".$row["room_id"]."";
		
		
		$sqlcourse = "SELECT `course_name` FROM `course` WHERE `course_id` = ".$row["course_id"]."";
		$resultCourse = $conn->query($sqlcourse);
		
        
		if ($resultCourse->num_rows > 0) 
		{
			while($roww = $resultCourse->fetch_assoc())
			{
				echo ",";
				echo "".$roww["course_name"]."";
				
			}
		}
		
		
		echo "|";
    }

} 



$conn->close();
?>



