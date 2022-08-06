<?php
 
// define variables and set to empty values
   include('inc/db_connect.php');



$sql = "DELETE FROM tbl_order_detail WHERE od_id='".$_GET['id']."'";

//echo $sql; exit;
$result = $conn->query($sql);

 
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

    