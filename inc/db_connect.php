<?php


$servername = "localhost";
$username = "root";
$pswrd = "";
$dbname = "db_mini_mobile";

// Create connection
$conn = new mysqli($servername, $username, $pswrd, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{

	//echo 'Database Connected';

}



?>