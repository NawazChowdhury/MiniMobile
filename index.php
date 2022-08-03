<?php  include('inc/header.php'); ?>
<?php  include('inc/slider.php'); ?>





	<div class="body-area">
		<div class="container">
			<h2 class="text-center"><br> Latest Products</h2>
		<div class="row col-md-12">
			
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


		
		<div class="col-md-12 text-center">
			<br>
			<a href="products.php"><button class="btn btn-primary">View More Products</button></a>
			<br>
			<br>
		</div>

		</div>

	</div>

<?php  include('inc/footer.php'); ?>
