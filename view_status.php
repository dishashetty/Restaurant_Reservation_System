<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "team_6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
session_start(); 



$sql1 ="SELECT applicant_id FROM applicant where user_name ='".$_SESSION['auname']."'";
 

$result123 = $conn->query($sql1);

if ($result123->num_rows > 0) {
    // output data of each row
    while($row = $result123->fetch_assoc()) {
        

echo "" . $row["applicant_id"]."<br>";
echo "" ."<br>";
$limit = intval($row["applicant_id"]);



	$result = mysqli_query($conn,"CALL view_status($limit, @stat)") or die("Query fail: " . mysqli_error($conn));


echo $_SESSION['auname'];
$select = mysqli_query($conn, 'select @stat');
$result1 = mysqli_fetch_assoc($select);
$status= intval($result1['@stat']);

echo "  ";

if($status==2)
{
echo "not Selected/Pending";
}
else if ($status===1)
{
echo "Selected";
}else{
echo"you have not applied";

}




} 

}else {
    echo "No Record Found";

}



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$conn->close();
?>