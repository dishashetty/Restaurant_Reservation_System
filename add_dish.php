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

$sql = "INSERT INTO menu(dish_name,price,description)
VALUES ('$_POST[name]','$_POST[price]','$_POST[description]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

 
  


$conn->close();
?>