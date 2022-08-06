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



			 <?php 

                                            include('inc/db_connect.php'); 

                                            $sql = "SELECT * FROM tbl_product WHERE p_id='".$_GET['id']."'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {  ?> 


                                              	 	<h2> <?=$row['p_name']?></h2>
												     
												    <p><b>Price <?=$row['p_price']?> CAD</b></p>
											 
												    <h3>Detail:</h3>
												    <p><?=$row['p_description']?></p>

												      <?php if(isset($_SESSION['user_type'])){ ?>

												    <a href="add_order.php?id=<?=$row['p_id']?>" class="btn btn-primary">Place Order</a>

													<?php }else{  ?>
													<!-- Button trigger modal -->

													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
													Place Order
													</button>

													<?php }  ?>
  
												

                                    

                                                
                                             <?php 
                                                 }
                                                } else {
                                                 // echo "0 results";
                                                }
                                            $conn->close();


                                        ?>

                                        <!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Required</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Please Login To Your Account To Place an Order
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
      </div>
    </div>
  </div>
</div>


			
				 
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

		</div>

	</div>

<?php  include('inc/footer.php'); ?>