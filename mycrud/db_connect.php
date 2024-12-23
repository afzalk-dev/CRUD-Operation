<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "testing";

$conn = mysqli_connect($host, $user, $pass, $database) or die("Database Connention Problem");

if($conn)
{
    
}else{
   echo "Error Data base connection";
}


?>