<?php
$servername = "localhost";
$username = "root";
$password = "agilefant";
$dbname = "team_6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
error_reporting(E_ALL ^ E_NOTICE);

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
<body background="background.jpg">
<font size="4"><a href="Login.html"style="float:right"><font color="white">Logout</a></font>

<h1 align="center"><font size="10" color="black">R@$0Y!</font></h1>
<h3 align="center"><color="black">-The Essence Of Indian Tradition-</font></h3>
<table cellpadding=30>
<tr>
<td><form action="View-Part-Profile.php" method="post"><input type="submit" value="View-Profile" id="form" ></form></td>
</tr>
</table>
<center><font size="4" color="white">
<table border=5 width=50% cellpadding=20>
<tr><td colspan=2 align=center>Details</td></tr>
<tr>
<td>Employee-Id:</td>
<?php
session_start();
$sql = "SELECT emp_id FROM employee where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<td>". $row["emp_id"]."</td>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}
?></tr>

<tr>
<td>Name:</td>

<?php
$sql = "SELECT CONCAT_WS(' ',first_name,last_name) as name FROM employee where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<td>". $row["name"]."</td>"."</tr>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}
?>

<tr>
<td>Date of Birth:</td>
<?php
$sql = "SELECT dob FROM employee where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<td>". $row["dob"]."</td>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}
?></tr>

<tr>
<td>Salary:</td>
<?php
$sql = "SELECT salary FROM employee where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<td>". $row["salary"]."</td>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}
?></tr>

<td>Contact:</td>
<?php
$sql = "SELECT contact FROM employee where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<td>". $row["contact"]."</td>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}?>
</tr>

<?php $add1=$add2=$city=$state=$zip="";
error_reporting(E_ALL ^ E_NOTICE);?>
<tr>
<td>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  
Address line-1: <br>Address line-2:<br>City:<br>State:<br>Zip-code:</td>
<td><input type="text" name="add1" value="<?php echo $add1;?>">
<br><input type="text" name="add2" value="<?php echo $add1;?>">
<br><input type="text" name="city" value="<?php echo $city;?>">
<br><input type="text" name="state" value="<?php echo $state;?>">
<br><input type="text" name="zip" value="<?php echo $zip;?>">
<br><input type="submit" name="Submit" value="Apply-Changes">
</form>
</td>
<?php 
$add1 = $_POST['add1'];
$add2= $_POST['add2'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];

$sql = "UPDATE employee e
inner join zipcode z on e.zip_code=z.zipcode
inner join city c on z.city_id=c.city_id
inner join state s on s.state_id=c.state_id
SET e.address_line_1 ='$add1', 
e.address_line_2='$add2',
e.zip_code=$zip,
c.city_name='$city',
s.state_name='$state'
   
where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);
?>
</tr>


<tr>
<td>Joining Date:</td>
<?php
$sql = "SELECT date_of_joining FROM employee where emp_id='$_SESSION[empid]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
echo "<td>". $row["date_of_joining"]."</td>";
echo "" ."<br>";
}
}
else {
echo "0 results";
}$conn->close();
?>

</table>
</font></body>
</html>
