<?php 

$host="localhost";
$db="ecommerce";
$user="root";
$pass="";

$conn = new mysqli($host, $user,$pass, $db);

//checking connection
if($conn->connect_error){
    die("connection failed:". $conn->connect_error);
}
echo"connected successfully";
?>