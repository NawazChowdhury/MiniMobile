<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mini Mobile Shop | Nawaz Ahmed Chowdhury</title>

	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<script src="bootstrap/dist/css/popper.min.js" ></script>
	<script src="bootstrap/dist/js/bootstrap.min.js" ></script>

	<!--CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


	<!--CDN-->
	<!--Custom-->
	<link href="css/style.css" rel="stylesheet" >
	<!--Custom-->



</head>
<body>

	<div class="nav_bar">
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container">
		    <a class="navbar-brand" href="#">Mini Mobile Shop</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		       
		      </ul>
	
		       <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		        </li>
		         <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="products.php">Shop</a>
		        </li>


		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="about.php">About Us</a>
		        </li>
		         <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
		        </li>
		        <?php if(isset($_SESSION['user_type'])){ ?>
					<li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="<?php if($_SESSION['user_type']=='admin'){ echo 'admin/index.php'; }else{ echo '#'; } ?>"><?=$_SESSION['user_name']?></a>
		        </li>

		        <?php  

		        	include('inc/db_connect.php');

		        	$cart=0;
		        	$order_id=0;

		        	$sql = "SELECT * FROM tbl_order WHERE user_id='".$_SESSION['user_id']."' AND o_status='0'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) { 
						$order_id=$row['o_id'];
					}
					} 


					$sql = "SELECT COUNT(od_id) AS c FROM tbl_order_detail WHERE o_id='".$order_id."'";

					//echo $sql; exit;
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) { 
						$cart=$row['c'];
					}
					} 


		        ?>

		        	<li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="cart.php?id=<?=$order_id?>">Cart <span class="badge bg-secondary"><?=$cart?></span></a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
		        </li>

		        <?php }else{ ?>
		          <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="signup.php">Sign Up</a>
		        </li>

		          <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="Login.php">Login</a>
		        </li>

		        <?php } ?>
		        		     
		      </ul>
		    </div>
		  </div>
		</nav>


	</div>
