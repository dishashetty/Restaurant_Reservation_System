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

?>
<!doctype html>
<html lang="en">
<head>
<title>Submitted Form</title>
<style>
body{background-repeat:repeat-y;background-size:100%}
#form{width: 15em;height: 3sem;}
#left{line-height:30px;width:250px;float:left;padding:15px; }
#right{line-height:30px;width:250px;float:right;padding:15px; }
</style>
</head>
<body >



<font size="4" color="black">
<center><table border=5 width=50%>
<tr>
<td colspan=12><h3 align="center">Form</h3>
</tr>
<tr>
<td>First Name</td>
<td>Last Name</td>
<td>Address Line 1</td>
<td>Address Line 2</td>
<td>DOB</td>
<td>Zipcode</td>
<td>Contact</td>
<td>Qualification</td>
<td>Position Applied</td>
<td>Date of Application</td>
<td>Email</td>


</tr>
<?php

session_start(); 



$sql = "SELECT first_name, last_name, addressline_1, addressline_2, zip_code, contact, position, qualification, date_of_application, email_id, date_of_birth FROM applicant where user_name = '".$_SESSION['auname']."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>" ."<td>". $row["first_name"]."</td>"."<td>".$row["last_name"]."</td>"."<td>".$row["addressline_1"]."</td>". "<td>".$row["addressline_2"]."</td>". "<td>". $row["date_of_birth"]."</td>"."<td>".$row["zip_code"]."</td>"." <td>". $row["contact"]."</td>"."  <td>". $row["qualification"]."</td>"." <td>". $row["position"]."</td>"."  <td>". $row["date_of_application"]."</td>"."   <td>". $row["email_id"]."</td>"."</tr>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}
$conn->close();
?>
</table>
<br></br>
<td><form action="Applicant_Home.html" method="post"><input type="submit" value="Exit" id="form"></form></td>
</body>
</html>
