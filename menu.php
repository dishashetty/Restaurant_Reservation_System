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
<h3 align="center"><font color="black">-The Essence Of Indian Tradition-</font></h3>
<table cellpadding=30>
<tr>
<td><form action="home.html" method="post"><input type="submit" value="Home" id="form" ></form></td>
<td><form action="menu.php" method="post"><input type="submit" value="Menu" id="form"></form></td>
<td><form action="res.html" method="post"><input type="submit" value="Reservation" id="form"></form></td>
<td><form action="about.html" method="post"><input type="submit" value="About us" id="form"></form></td>
<td><form action="Login.html" method="post"><input type="submit" value="Employee-Login" id="form"></form></td>

<tr></tr>
<td><form action="Signup.html" method="post"><input type="submit" value="Apply for a Job" id="form"></form></td>

<td><form action="Applicant_Login.html" method="post"><input type="submit" value="Applicant Login" id="form"></form></td>





</tr>
</table>
<font size="4" color="black">
<center><table border=5 width=50%>
<tr>
<td colspan=3><h3 align="center">MENU</h3>
</tr>
<tr>
<td>Dish_name</td>
<td>Price</td>
<td>Description</td>
</tr>
<?php
$sql = "SELECT Dish_name,Price,description FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>" ."<td>". $row["Dish_name"]."</td>"."<td>"."$".$row["Price"]."</td>"."<td>".$row["description"]."</td>"."</tr>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>
