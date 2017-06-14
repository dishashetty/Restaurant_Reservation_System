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
<title>Applicant</title>
<style>
body{background-repeat:repeat-y;background-size:100%}
#form{width: 15em;height: 3sem;}
#left{line-height:30px;width:250px;float:left;padding:15px; }
#right{line-height:30px;width:250px;float:right;padding:15px; }
</style>
</head>
<body background="menu.jpg">

<h1 align="center"><font size="10" color="black">R@$0Y!</font></h1>
<h3 align="center"><font color="black">-The Essence Of Indian Tradition-</font></h3>

<font size="4" color="black">
<center>


<font size="4" color="black">
<center><table border=5 width=50%>
<tr>
<td colspan=5><h3 align="center">APPLICANT INFO</h3>
</tr>
<tr>
<td>APPLICANT ID</td>
<td>FIRST NAME</td>
<td>LAST NAME</td>
<td>POSITION</td>
<td>QUALIFICATION</td>
</tr>




<?php
     
// this starts the session 
session_start(); 

// this sets variables in the session 
$_SESSION['appl_id']=$_POST['sub1'];


//$sql = "SELECT applicant_id,first_name,last_name,position,qualification from applicant where applicant_id='$_POST[sub1]'";
$sql = "SELECT applicant_id,first_name,last_name,position,qualification from applicant where applicant_id='".$_SESSION['appl_id']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>" ."<td>". $row["applicant_id"]."</td>"."<td>".$row["first_name"]."</td>"."<td>".$row["last_name"]."</td>"."<td>".$row["position"]."</td>"."<td>".$row["qualification"]."</td>"."</tr>";


echo "" ."<br>";
}
}
else {
echo "0 results";
}
$conn->close();
?>
</table>
<table cellpadding=30>
<tr>
<td><form action="accept1.php" method="post"><input type="submit" value="ACCEPT" id="form" ></form></td>
<td><form action="Reject.php" method="post"><input type="submit" value="REJECT" id="form"></form></td>
</tr>
</table>
</body>
</html>
