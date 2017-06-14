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
<title>Menu</title>
<style>
body{background-repeat:repeat-y;background-size:100%}
#form{width: 15em;height: 3sem;}
#left{line-height:30px;width:250px;float:left;padding:15px; }
#right{line-height:30px;width:250px;float:right;padding:15px; }
</style>
</head>
<body background="menu.jpg">

<h1 align="center"><font size="10" color="black">R@$0Y!</font></h1>
<h3 align="center"><color="black">-The Essence Of Indian Tradition-</font></h3>
<table cellpadding=30>
<tr>
<td><form action="home.html" method="post"><input type="submit" value="Home" id="form" ></form></td>
<td><form action="menu.php" method="post"><input type="submit" value="Menu" id="form"></form></td>
<td><form action="res.html" method="post"><input type="submit" value="Reservation" id="form"></form></td>
<td><form action="about.html" method="post"><input type="submit" value="About us" id="form"></form></td>
<td><form action="Login.html" method="post"><input type="submit" value="Employee-Login" id="form"></form></td>
</tr>
</table>
<font size="4" color="white">
<h3 align="center">MENU</h3>


 </font>

<?php

echo "" . "TABLE NO&nbsp"."  "."CAPACITY"."  "."<br>";
echo "" ."<br>";

$sql ="SELECT distinct table_no,capacity FROM restaurant_table ";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
echo "" . $row["table_no"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$row["capacity"]."<br>";
echo "" ."<br>";





    }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
