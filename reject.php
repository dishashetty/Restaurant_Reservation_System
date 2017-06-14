<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


session_start(); 

echo "the applicant has been rejected with id =  ";
echo $_SESSION['appl_id'];
$sql ="DELETE from applicant WHERE applicant_id ='".$_SESSION['appl_id']."' ";
$result = $conn->query($sql);






$conn->close();
?>

<a href="Manager_login.php">Home</a>