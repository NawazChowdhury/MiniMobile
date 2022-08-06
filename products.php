<?php  include('inc/header.php'); ?>


	<div class="body-area">
		<div class="container">
			<h2 class="text-center"><br> All Products</h2>
			<div class="row">
			<div class="col-md-2">
				
				<form action="" method="get">
					 <div class="form-group">
					    <input type="text" name="search" class="form-control" placeholder="Product Name">

					  </div>

					  

					   <div class="form-group">
					   	<br>
					    <button class="btn btn-primary" type="submit">Search Now</button>

					  </div>


					  
				</form>

			</div>
		<div class="row col-md-10">
			
			

					 <?php 

                                            include('inc/db_connect.php'); 

                                            if(isset($_GET['search'])){
                                            	  $sql = "SELECT * FROM tbl_product WHERE p_name LIKE '%".$_GET['search']."%' OR p_description LIKE '%".$_GET['search']."%' OR p_price LIKE '%".$_GET['search']."%'";
                                            	}else{

                                            		  $sql = "SELECT * FROM tbl_product";
                                            	}

                                          
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {  ?> 

                                      

                                                <div class=" col-md-3">
				<div class="card col-md-12 products">
				
				  <img src="<?=$row['p_image']?>"  style="padding: 10px;height:300px;" class="card-img-top" alt="<?=$row['p_name']?>">
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

		</div>


		</div>

	</div>


	<div class="footer-area">
		<div class="">

			<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="#"><i ></i>Home</a></li>
						<li><a href="#"><i ></i>Shop</a></li>
						<li><a href="#"><i ></i>About</a></li>
						<li><a href="#"><i ></i>Contact</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>News</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="#"><i ></i>New Arrival</a></li>
						<li><a href="#"><i ></i>Cheap Price</a></li>
						<li><a href="#"><i ></i>FAQ</a></li>
						<li><a href="#"><i ></i>Get Started</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Address</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="">10 Teesdale Place</a></li>
						<li><a href="">M1L 1K9</a></li>
						<li><a href="">Toronto, Ontario</a></li>
						<li><a href="">Canada</a></li>
						
					</ul>
				</div>
			</div>
		
		
		</div>
	</section>
	<!-- ./Footer -->


			<div class="credits-area text-center">
			<p>Developed by Nawaz Ahmed Chowdhury &copy 2022</p>
			</div>
		</div>
	</div>

	
</body>
</html>