<?php  include('inc/header.php'); ?>


	<div class="body-area">
		<div class="container">
			
		<div class="row col-md-12">
			
			

			<div class=" col-md-12">
				<div class="card col-md-12 products">
					<div class="row">
					<div class="col-md-4">
				
				 		 <img src="img/4.jpg"  style="padding: 10px;max-height: " class="card-img-top" alt="Mobile Image">

				  	</div>

				  	<div class="col-md-8">

				  <div class="card-body">
				  	<h2> Product Title</h2>
				    <h5 class="card-title">Samsung Mobile</h5>
				    <p><b>Price $290 CAD</b></p>
				    <p class="card-text">Samsung s21 latest mobile with</p>

				    <h3>Detail:</h3>
				    <p>A product detail page (PDP) is a web page on an eCommerce site that presents the description of a specific product in view. The details displayed often include size, color, price, shipping information, reviews, and other relevant information customers may want to know before making a purchase</p>

				    <a href="detail.html" class="btn btn-primary">Place Order</a>
				  </div>

				  </div>


				  </div>
				  </div>
			</div>



		</div>


		<div class="row col-md-12">
			<div class="col-md-12">
			<br>
			<h2>Other Products</h2>
			<br>
			<br>
			</div>

			<?php for($i=1;$i<=4;$i++){  ?>
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

<?php  include('inc/footer.php'); ?>