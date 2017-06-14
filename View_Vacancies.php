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
<title>Vacancies</title>
<style>
body{background-repeat:repeat-y;background-size:100%}
#form{width: 15em;height: 3sem;}
#left{line-height:30px;width:250px;float:left;padding:15px; }
#right{line-height:30px;width:250px;float:right;padding:15px; }
</style>
</head>
<body >

<h1 align="center"><font size="10" color="black">R@$0Y!</font></h1>
<h3 align="center"><font color="black">-The Essence Of Indian Tradition-</font></h3>

<font size="4" color="black">
<center><table border=5 width=50%>
<tr>
<td colspan=3><h3 align="center">Vacancies</h3>
</tr>
<tr>
<td>Sno.</td>
<td>Title</td>
<td>No. of Vacancies</td>
</tr>
<?php
$sql = "SELECT id, title, num_of_vac FROM vacancy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
if($row["num_of_vac"]<1)
{
echo " ";
}
else
{

echo "<tr>" ."<td>". $row["id"]."</td>"."<td>".$row["title"]."</td>"."<td>".$row["num_of_vac"]."</td>"."</tr>";
echo "" ."<br>";
}
}
}
else {
echo "0 results";
}
$conn->close();
?>
</table>
<br></br>
<td><form action="Signup.html" method="post"><input type="submit" value="Apply" id="form"></form></td>
</body>
</html>
