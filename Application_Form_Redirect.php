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



$sql = "INSERT INTO applicant(first_name, last_name, addressline_1, addressline_2, zip_code, contact, position, qualification, date_of_application, email_id, user_name, date_of_birth)
VALUES ('$_POST[fname]','$_POST[lname]','$_POST[add1]','$_POST[add2]', '$_POST[zip]', '$_POST[contact]', '$_POST[type]','$_POST[desc]', '$_POST[date]', '$_POST[email]', '".$_SESSION['auname']."', '$_POST[dob]')";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql3 = "SELECT MAX(applicant_id) FROM applicant";
	$result1 = $conn->query($sql3);

	if ($result1->num_rows > 0) {
  	  // output data of each row
   	 while($row = $result1->fetch_assoc()) {
        
	echo "your applicant id is ";
echo "" . $row["MAX(applicant_id)"]."<br>";
	
	echo "" ."<br>";

	$limit1 = intval($row["MAX(applicant_id)"]);

}
}


$sql2= "INSERT INTO Applicant_ssn(applicant_id,ssn)
VALUES ($limit1 ,'$_POST[ssn]')";

if ($conn->query($sql2) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}


echo "  ";














$conn->close();
?>
<a href="Applicant_Home.html">Home</a>