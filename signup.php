<?php  include('inc/header.php'); ?>

<?php
// define variables and set to empty values
$nameErr =$emailErr = $passwordErr = $c_passwordErr = $mobileErr =$loginErr="";
$name= $email = $password = $c_password = $mobile="";

$validation= true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$validation= true;


 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $validation= false;
  } else {
    $name = test_input($_POST["name"]);
   
  }


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

  if (empty($_POST["c_password"])) {
    $c_passwordErr = "Confirm Password is required";
        $validation= false;
  } else {
    $c_password = test_input($_POST["c_password"]);
    if($c_password!= $password){
 		$c_passwordErr = "Confirm Password is Must be same as password";
        $validation= false;

    }else{

    	 $c_password = test_input($_POST["c_password"]);

    }

  }


   if (empty($_POST["mobile"])) {
    $mobileErr = "Mobile is required";
    $validation= false;
  } else {
    $mobile = test_input($_POST["mobile"]);
    
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



	$sql = "INSERT INTO tbl_user (name, email, password,mobile)
	VALUES ('".$name."', '".$email."', '".$password."', '".$mobile."')";

	if ($conn->query($sql) === TRUE) {
	  
	  		header("Location: login.php?created=1");

	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}




?>
	<div class="body-area">
		<div class="container">
			<h2 class="text-center"><br>Signup</h2>
			<div class="row">
				<div class="offset-md-4 col-md-4">
					<div class="signup_area">

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						 <div class="form-group">
					  
					    <input type="text" class="form-control" value="<?=$name?>" name="name" placeholder="Enter Name">
					  
					    <span class="error"><?=$nameErr?></span>
					      <br>
					  </div>

				


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


					  <div class="form-group">
					    <input type="password" class="form-control" value="<?=$c_password?>" name="c_password" placeholder="Confirm Password">
					   
					     <span class="error"><?=$c_passwordErr?></span>
					      <br>
					  </div>

					  <div class="form-group">
					  
					    <input type="text" class="form-control" value="<?=$mobile?>" name="mobile" placeholder="Enter Mobile Number">
					  
					    <span class="error"><?=$mobileErr?></span>
					      <br>
					  </div>
					 
					  <button type="submit" class="btn btn-primary">Signup Now</button>

					  <br>
					  <br>
					  <p>Do you have account already? <a href="login.php">Login</a> </p>
					</form>
					</div>


				</div>
			
		

			</div>


		</div>

	</div>



<?php  include('inc/footer.php'); ?>
