<?php include('inc/header.php')?>
<?php include('inc/sidebar.php')?>


<?php
// define variables and set to empty values
$p_nameErr =$p_descriptionErr = $p_priceErr =  $p_qtyErr= $fileErr="";
$p_name= $p_description = $p_price =$p_qty =  $success="";

$validation= true;
$uploadOk=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $validation= true;


 if (empty($_POST["p_name"])) {
    $p_nameErr = "Product Name is required";
    $validation= false;
  } else {
    $p_name = test_input($_POST["p_name"]);
   
  }


  if (empty($_POST["p_price"])) {
    $p_priceErr = "Product Price is required";
    $validation= false;
  } else {

        if (!is_numeric($_POST["p_price"])) {
        $p_priceErr = "Product Price Must be Number";
        $validation= false;
        } else {
        $p_price = test_input($_POST["p_price"]);


        }
   
  }


   if (empty($_POST["p_description"])) {
    $p_descriptionErr = "Product Description is required";
    $validation= false;
  } else {
    $p_description = test_input($_POST["p_description"]);
   
  }


   if (empty($_POST["p_qty"])) {
    $p_qtyErr = "Product Price is required";
    $validation= false;
  } else {

        if (!is_numeric($_POST["p_qty"])) {
        $p_qtyErr = "Product Qunatity Must be Number";
        $validation= false;
        } else {
        $p_qty = test_input($_POST["p_qty"]);


        }
   
  }



$target_dir = "../image/";
$saveDb="image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$saveImageDb=$saveDb. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
     $fileErr= "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $fileErr= "File is not an image.";
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $fileErr= "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $fileErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}




// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $fileErr="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


    // Check if file already exists
if (file_exists($target_file)) {
  
    
/* create new name file */
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["fileToUpload"]["tmp_name"];
$destination  = "../Image/{$basename}";

/* move the file */
move_uploaded_file( $source, $destination );

$saveImageDb=$saveDb.$basename;


}else{

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
   // echo "Sorry, there was an error uploading your file.";
  }


}

  
}






}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if($validation&&$uploadOk&&$_SERVER["REQUEST_METHOD"] == "POST"){

    
    include('inc/db_connect.php');



    $sql = "INSERT INTO tbl_product (p_name, p_price, p_description,p_image,p_qty)
    VALUES ('".$p_name."', '".$p_price."', '".$p_description."', '".$saveImageDb."', '".$p_qty."')";

    if ($conn->query($sql) === TRUE) {
      
            // header("Location: login.php?created=1");

        //echo 'Added Successfully';

        $success="Product Added Successfully!!!";

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}




?>

      
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-6">Add Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Product To Database</li>
                        </ol>
                        <div class="row">

                            <div class="col-md-6">
                                <?php if($success){ ?>
                                 <div class="col-md-12 alert alert-success"><?=$success?></div>
                                <?php } ?> 
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                                    

                                <div class="form-group">

                                    <input type="text" class="form-control" value="<?=$p_name?>" name="p_name" placeholder="Enter Product Name">

                                    <span class="error"><?=$p_nameErr?></span>
                                    <br>
                                    
                                </div>

                                 <div class="form-group">

                                    <input type="text" class="form-control" value="<?=$p_price?>" name="p_price" placeholder="Enter Product Price">

                                    <span class="error"><?=$p_priceErr?></span>
                                    <br>
                                    
                                </div>




                                  <div class="form-group">

                                    <textarea name="p_description"  class="form-control"  placeholder="Enter Product Description"><?=$p_description?></textarea>

                            
                                    <span class="error"><?=$p_descriptionErr?></span>
                                    <br>
                                    
                                </div>



                                 <div class="form-group">

                                    <input type="text" class="form-control" value="<?=$p_qty?>" name="p_qty" placeholder="Enter Product Qty">

                                    <span class="error"><?=$p_qtyErr?></span>
                                    <br>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                     <span class="error"><?=$fileErr?></span>
                                     <br>
                                     <br>
                                </div>


                                <button type="submit" class="btn btn-primary">Add Now</button>
                                
                                </form>


                                </div>

                               
                               
                            </div>
                            





                        </div>
                      
                       
                    </div>
                </main>
          