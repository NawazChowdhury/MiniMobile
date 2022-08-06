<?php  include('inc/header.php'); ?>
<?php  include('inc/slider.php'); ?>





	<div class="body-area">
		<div class="container">
			<h2 class="text-center"><br> Latest Products</h2>
		<div class="row col-md-12">

			 <?php 

                                            include('inc/db_connect.php'); 

                                            $sql = "SELECT * FROM tbl_product LIMIT 20";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {  ?> 

                                      

                                                <div class=" col-md-3">
				<div class="card col-md-12 products">
				
				  <img src="<?=$row['p_image']?>"  style="padding: 10px;" class="card-img-top" alt="<?=$row['p_name']?>">
				  <div class="card-body">
				    <h5 class="card-title"><?=$row['p_name']?></h5>
				    <p><b>Price <?=$row['p_price']?> CAD</b></p>
				    <p class="card-text"><?=substr($row['p_description'],0,50)?>...</p>
				    <a href="detail.php?id=<?=$row['p_id']?>" class="btn btn-primary">View Detail</a>
				  </div>
				  </div>
			</div>

                                                
                                             <?php 
                                                 }
                                                } else {
                                                 // echo "0 results";
                                                }
                                            $conn->close();


                                        ?>
			
		 

		</div>


		
		<div class="col-md-12 text-center">
			<br>
			<a href="products.php"><button class="btn btn-primary">View More Products</button></a>
			<br>
			<br>
		</div>

		</div>

	</div>

<?php  include('inc/footer.php'); ?>
