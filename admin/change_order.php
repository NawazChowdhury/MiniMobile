<?php
 
// define variables and set to empty values
   include('inc/db_connect.php');

 

$sql = "UPDATE tbl_order SET o_status='".$_GET['status']."' WHERE o_id='".$_GET['id']."'";
$result = $conn->query($sql);

 
 
header('Location: '.$_SERVER['HTTP_REFERER']);


?>

    