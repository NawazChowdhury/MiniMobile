<?php  include('inc/header.php'); ?>



<?php
// define variables and set to empty values
$emailErr = $passwordErr = $loginErr="";
$email = $password = $success= "";

$validation= true;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

	if(isset($_GET["created"])){

		$success= "Congratulation!!! Your Account Created Successfully.Please Login";

	}

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$validation= true;

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $validation= false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $validation= false;
    }
  }


  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
        $validation= false;
  } else {
    $password = test_input($_POST["password"]);

  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if($validation&&$_SERVER["REQUEST_METHOD"] == "POST"){

	
	include('inc/db_connect.php');


	$sql = "SELECT * FROM tbl_user WHERE email='".$email."' AND password='".$password."'";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	   // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["type"]. "<br>";

	  	if($row["type"]=='admin'){

	  		$_SESSION['user_type']=$row["type"];
	  		$_SESSION['user_name']=$row["name"];
	  		$_SESSION['user_id']=$row["id"];

	  		header("Location: admin/index.php");




	  	}else{

	  		$_SESSION['user_type']=$row["type"];
			$_SESSION['user_name']=$row["name"];
			$_SESSION['user_id']=$row["id"];


			header("Location: index.php");


			
	  	}

	  }


	} else {
		 $loginErr = "Sorry! Invalid Email or Password";
	}





	$conn->close();

}




?>


	<div class="body-area">
		<div class="container">
			<h2 class="text-center"><br>Login</h2>
			<div class="row">
				<div class="offset-md-4 col-md-4">
					<br>
					<?php if($loginErr){ ?>
					<div class="col-md-12 alert alert-danger"><?=$loginErr?></div>
				<?php } ?> 

				<?php if($success){ ?>
					<div class="col-md-12 alert alert-success"><?=$success?></div>
				<?php } ?> 

					<div class="login_area">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					  <div class="form-group">
					  
					    <input type="email" class="form-control" value="<?=$email?>" name="email" placeholder="Enter email">
					  
					    <span class="error"><?=$emailErr?></span>
					      <br>
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control" value="<?=$password?>" name="password" placeholder="Password">
					   
					     <span class="error"><?=$passwordErr?></span>
					      <br>
					  </div>
					 
					  <button type="submit" class="btn btn-primary">Login</button>
					  <br>
					  <br>
					  <p>Don't you have account? <a href="signup.php">Signup</a> </p>
					</form>
					</div>


				</div>
			
		

			</div>


		</div>

	</div>

<?php  include('inc/footer.php'); ?>
