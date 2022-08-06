<?php  include('inc/header.php');  ?>


	<div class="body-area">
		<div class="container">
			
		<div class="row col-md-12">
			
			

			<div class=" col-md-12">
				<div class=" col-md-12 products">
					<div class="row">

						<table class="table table-striped">
							<tr>
								<th>Image</th>
								<th>Product Name</th>
								<th>Price</th>
								<th></th>

							</tr>
						
<?php 

						  include('inc/db_connect.php'); 

						  $total=0;

                                            $sql = "SELECT * FROM tbl_product,tbl_order_detail WHERE tbl_product.p_id=tbl_order_detail.p_id AND  tbl_order_detail.o_id='".$_GET['id']."'";
                                            $result = $conn->query($sql);

                                           if ($result!== false&&$result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {   ?>

                                              	<tr>
								<td><img src="<?=$row['p_image']?>"  style="width: 80px;height: 100px; "></td>
								<td><?=$row['p_name']?></td>
								<td><?=$row['p_price']?></td>
								<td><a href="delete_cart.php?id=<?=$row['od_id']?>">x</a></td>
							</tr>
					 
												

                                    

                                                
                                             <?php 

                                             $total=$total+$row['p_price'];
                                                 }
                                                } else {
                                                 // echo "0 results";
                                                }
                                            $conn->close();


                                        ?>

                                    

                                        	<tr>
												<th>Total</th>
												<th></th>
												<th><?=$total?></th>
												<th></th>

											</tr>
				 
	
						</table>
			
				 
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

                                            $sql = "SELECT * FROM tbl_product  ORDER BY RAND() LIMIT 4";
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

<?php  include('inc/footer.php'); ?>