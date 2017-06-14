<?php
if(isset($_POST["submit"])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "team_6";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $id = mysqli_real_escape_string($conn, $_POST['empid']); 
    $password = mysqli_real_escape_string($conn, $_POST['emppass']);  
    $type = mysqli_real_escape_string($conn, $_POST['emp']);  



 
// this starts the session 
session_start(); 

// this sets variables in the session 
$_SESSION['empid']=$_POST['empid'];

 

    $result = $conn->query("SELECT emp_id, password, type FROM employee WHERE emp_id ='$id' AND password='$password' AND type='$type'");



   if (mysqli_num_rows($result)) 
        {
            if(isset($type) && $type == 'Manager')
            {
            header('location:Manager_login.php');
            }
            elseif(isset($type) && $type == 'Full Time'){
                header('location:Full_login.php');
            }
            else{
                header('location:Part_login.php');
            }
        }
    else
    {      
        echo "login unsuccessfull, please try again";     
    }
   
}


 
  


$conn->close();
?>