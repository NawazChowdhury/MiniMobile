<?php include('inc/header.php')?>
<?php include('inc/sidebar.php')?>


<?php
 
// define variables and set to empty values
   include('inc/db_connect.php');

$sql = "SELECT * FROM tbl_product WHERE p_id='".$_GET['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
 
  $image_path =  $row['p_image'];

}
} else {
echo "0 results";
}

 unlink('../'.$image_path);

$sql = "DELETE FROM tbl_product WHERE p_id='".$_GET['id']."'";
$result = $conn->query($sql);

 
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

    