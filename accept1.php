<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
session_start(); 


	$result = mysqli_query($conn, 
     "CALL add_applicant('".$_SESSION['appl_id']."')") or die("Query fail: " . mysqli_error());
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "the applicant has been accepted with id =  ";
echo $_SESSION['appl_id'];
echo "  ";


$conn->close();
?>
<a href="Manager_login.php">Home</a>