
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
<form action="Applicant_view.php" method='post'>

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
 




$select= "";
$result = $conn -> query ("SELECT applicant_id FROM applicant"); 
if(mysqli_num_rows($result) > 0 ){
echo "<select name='sub1'>";
 while ($row = mysqli_fetch_array ($result)) {
	
	echo "<option value='" . $row['applicant_id'] . "'>" . $row['applicant_id'] . "</option>";


     
// this starts the session 
session_start(); 

// this sets variables in the session 
$_SESSION['appl_id']=$_POST['sub1'];




 }
}

echo "</select>";
?>
<input type="submit" />


</form>

</table>
</body>
</html>