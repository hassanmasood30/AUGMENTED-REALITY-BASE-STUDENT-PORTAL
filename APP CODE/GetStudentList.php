<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT student_name FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "".$row["student_name"]."";
		echo ",";
    }
} 
$conn->close();
?>



