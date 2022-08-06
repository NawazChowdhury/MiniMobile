<?php include('inc/header.php')?>
<?php include('inc/sidebar.php')?>


<?php


$nameErr =$emailErr = $passwordErr = $c_passwordErr = $mobileErr =$loginErr="";
$name= $email = $password = $c_password = $mobile= $success="";



include('inc/db_connect.php');

$sql = "SELECT * FROM tbl_user WHERE id='".$_GET['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
 
$name= $row['name'];
$email = $row['email'];
$password = $row['password'];
$mobile=$row['mobile'];

}
} else {
echo "0 results";
}



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


 

   $sql = "UPDATE tbl_user SET name ='".$name."', email ='".$email."', password='".$password."',mobile='".$mobile."' WHERE id='".$_GET['id']."'";

  if ($conn->query($sql) === TRUE) {
    
        $success="User Updated Successfully!!!";
      
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}


?>

      
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-6">Update user</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update User To Database</li>
                        </ol>
                        <div class="row">

                            <div class="col-md-6">
                                <?php if($success){ ?>
                                 <div class="col-md-12 alert alert-success"><?=$success?></div>
                                <?php } ?> 
                               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?=$_GET['id']?>" method="post">
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
                                  <input type="password" class="form-control" value="<?=$password?>" name="c_password" placeholder="Confirm Password">
                                 
                                   <span class="error"><?=$c_passwordErr?></span>
                                    <br>
                                </div>

                                <div class="form-group">
                                
                                  <input type="text" class="form-control" value="<?=$mobile?>" name="mobile" placeholder="Enter Mobile Number">
                                
                                  <span class="error"><?=$mobileErr?></span>
                                    <br>
                                </div>
                               
                                <button type="submit" class="btn btn-primary">update Now</button>
                              </form>


                                </div>

                               
                               
                            </div>
                            





                        </div>
                      
                       
                    </div>
                </main>
  
  <?php  include('inc/footer.php'); ?>