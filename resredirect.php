<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
session_start(); 



 
 //Calling the simple_operation function
 $result = mysqli_query($conn,"SELECT rest_reservation('$_POST[emem]','$_POST[date_book]','$_POST[time]')") ;
 
while($row = mysqli_fetch_row($result))
 {
if ($row[0] !=0)
 { 
echo 'The table number is = '.$row[0];

}
else
 {
    echo "Currently we do not have any tables as per your selections";
}

 }








 


$conn->close();
?>