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




$sql1 = " delete from reservation 
where date_booked= '$_POST[date_book]' and
time='$_POST[time]'
AND table_no='$_POST[table_no]'
";

if ($conn->query($sql1) === TRUE) {
    echo "The reservation has been cancelled";

} else {
    echo "The reservation you are trying to cancel doesnt exist " . $sql1 . "<br>" . $conn->error;
}






$conn->close();
?>