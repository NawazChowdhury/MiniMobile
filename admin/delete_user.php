<?php
 
// define variables and set to empty values
   include('inc/db_connect.php');



$sql = "DELETE FROM tbl_user WHERE id='".$_GET['id']."' AND type='user'";

//echo $sql; exit;
$result = $conn->query($sql);

 
header('Location:view_user.php');


?>

    