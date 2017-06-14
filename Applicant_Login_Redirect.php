<?php

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


    $username = mysqli_real_escape_string($conn, $_POST['auname']); 
    $password = mysqli_real_escape_string($conn, $_POST['apass']);  
   



 
// this starts the session 
session_start(); 

// this sets variables in the session 
$_SESSION['auname']=$_POST['auname'];





 

    $result = $conn->query("SELECT user_name, password FROM applicant_signup WHERE user_name ='$username' AND password='$password'");



   if (mysqli_num_rows($result)) 
        {
            
            
            header('location:Applicant_Home.html');
            
            
        }
    else
    {      
        echo "login unsuccessfull, please try again";     
    }
   

  


$conn->close();
?>