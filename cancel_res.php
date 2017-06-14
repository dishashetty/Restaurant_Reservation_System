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
<style type="text/css">

label:after {
  content: ": ";
}

label {
  
  color: white;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: xx-small;
}</style>
<style>
body{background-repeat:repeat-y;background-size:100%}
#form{width: 15em;height: 3sem;}
#left{line-height:30px;width:250px;float:left;padding:15px; }
#right{line-height:30px;width:250px;float:right;padding:15px; }
<script src="form_validation.js"></script>
</style>
</head>
<body background="background.jpg">

<font size="4"><a href="Login.html"style="float:right"><font color="white">Logout</a></font>

<h1 align="center"><font size="10" color="black">R@$0Y!</font></h1>
<h3 align="center"><color="black">-The Essence Of Indian Tradition-</font></h3>
<table align="center" cellpadding=30>
<tr>
<td><form action="View-Profile.php" method="post"><input type="submit" value="View-Profile" id="form" ></form></td>
<td><form action="Edit-Menu.html" method="post"><input type="submit" value="Edit-Menu" id="form"></form></td>
<td><form action="edit_reservation.php" method="post"><input type="submit" value="Edit-Reservation" id="form"></form></td>
</tr>
</table>
<table>
<?php
?>

<form action="cancel_res_redirect.php" method="post" onsubmit="return formvalidation();">
<table align="center">
<center><label>Enter Table No, Date and select meal type for which you want to cancel the reservation </label></center><br>
<tr><td><label>Enter Table No </label><input type="text" name="table_no" required></td><br><br></tr>

<tr><td><label>Select Time</label></td><td>
<select name="time"><opt group label="select meal time">n</label>
<option value="10:00:00">10:00 AM
<option value="11:00:00">11:00 AM
<option value="12:00:00">12:00 PM
<option value="13:00:00">1:00 PM
<option value="14:00:00">2:00 PM
<option value="15:00:00">3:00 PM

</select>
</td></tr>
<tr>
<td><label>Date</label><input type="date" name="date_book" id="o" required></td>
</tr>


<td>  
  <input type="submit" value="Cancel Reservation" >
</td>
</table>
</form>
</body>
</html>
