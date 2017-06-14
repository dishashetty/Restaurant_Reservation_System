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

$sql = "INSERT INTO applicant_signup(user_name, password)
VALUES ('$_POST[auname]','$_POST[apass]')";

if ($conn->query($sql) === TRUE) {
    

echo "You are successfully signed-up";
}

 else {
    echo "Username is already taken " ;
}









$conn->close();
?>

<a href="home.html">HOME</a>
<?php
?>

