<?php  include('inc/header.php'); ?>


	<div class="body-area">
		<div class="container">
			<h2 class="text-center"><br> All Products</h2>
			<div class="row">
			<div class="col-md-2">
				
				<form action="">
					 <div class="form-group">
					    <input type="text" name="p_name" class="form-control" placeholder="Product Name">

					  </div>

					   <div class="form-group">
					  	<br>
					    <input type="number" name="p_price" class="form-control" placeholder="Product Price">

					  </div>

					   <div class="form-group">
					   	<br>
					    <button class="btn btn-primary" type="submit">Search Now</button>

					  </div>


					  
				</form>

			</div>
		<div class="row col-md-10">
			
			

			<?php for($i=1;$i<=12;$i++){  ?>
			<div class=" col-md-3">
				<div class="card col-md-12 products">
				
				  <img src="img/4.jpg"  style="padding: 10px;" class="card-img-top" alt="Mobile Image">
				  <div class="card-body">
				    <h5 class="card-title">Samsung Mobile</h5>
				    <p><b>Price $290 CAD</b></p>
				    <p class="card-text">Samsung s21 latest mobile with</p>
				    <a href="detail.php" class="btn btn-primary">View Detail</a>
				  </div>
				  </div>
			</div>
			<?php } ?>
	


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