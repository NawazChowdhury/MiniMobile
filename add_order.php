<?php
 session_start();  
	
	include('inc/db_connect.php');

	$order_id=0;


	//Checking user Order has pending Order or Not


	$sql = "SELECT * FROM tbl_order WHERE user_id='".$_SESSION['user_id']."' AND o_status='0'";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) { 
		$order_id=$row['o_id'];
	}
	}else{

		$date=date('Y-m-d');

		$user_id=$_SESSION['user_id'];

		$sql = "INSERT INTO tbl_order (o_date, user_id)
			VALUES ('".$date."', '".$user_id."')";

			if ($conn->query($sql) === TRUE) {
	  
				$order_id = $conn->insert_id;

			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}

	}


		$sql = "SELECT * FROM tbl_product WHERE p_id='".$_GET['id']."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) { 
	 
		  $p_price =$row['p_price'];
	 
		 
	}
	}else{

	}


	$sql = "INSERT INTO tbl_order_detail (o_id, p_id, p_qty,p_price,p_total)
	VALUES ('".$order_id."','".$_GET['id']."', '1', '".$p_price."', '".$p_price."')";

	if ($conn->query($sql) === TRUE) {
	  
	  		header("Location: detail.php?id=".$_GET['id']."&add=1");

	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

 




?>
