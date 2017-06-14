<?php
$servername = "localhost";
$username = "root";
$password = "agilefant";
$dbname = "team_6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$sql = "SELECT dish_name FROM menu WHERE dish_name=('$_POST[name]') ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

$sql1 = "DELETE FROM menu
        WHERE dish_name=('$_POST[name]')";


if ($conn->query($sql1) === TRUE) {
    echo "New record deleted successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

   
}

else {
echo "The dish you are trying to remove is not currently on the menu";
}































 
  


$conn->close();
?>