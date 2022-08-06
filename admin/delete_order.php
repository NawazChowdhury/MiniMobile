<?php include('inc/header.php')?>
<?php include('inc/sidebar.php')?>


<?php
 
// define variables and set to empty values
   include('inc/db_connect.php');

 

$sql = "DELETE FROM tbl_order WHERE o_id='".$_GET['id']."'";
$result = $conn->query($sql);

$sql = "DELETE FROM tbl_order_detail WHERE o_id='".$_GET['id']."'";
$result = $conn->query($sql);

 
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

    