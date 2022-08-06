<?php include('inc/header.php')?>
<?php include('inc/sidebar.php')?>



      
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">View Product</h1>
                        
                        <div class="row">

                              <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Product name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>

                                        <?php 

                                            include('inc/db_connect.php'); 

                                               $sql = "SELECT * FROM tbl_product,tbl_order_detail WHERE tbl_product.p_id=tbl_order_detail.p_id AND  tbl_order_detail.o_id='".$_GET['id']."'";

                                            $result = $conn->query($sql);

                                            $total=0;

                                            if ($result!== false&&$result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) { $count=1; ?> 

                                                 <tr>
                                                    <td><?=$count?></td>
                                                    <td><img style="width: 50px;height: 70px;"src="../<?=$row['p_image']?>" alt="<?=$row['p_name']?>"></td>
                                                    <td><?=$row['p_name']?></td>
                                                    <td><?=$row['p_price']?></td>
                                              
                                                
                                        
                                                </tr>

                                                
                                             <?php 

                                             $total=$total+$row['p_price'];
                                                 $count++; }
                                                } else {
                                                 // echo "0 results";
                                                }
                                            $conn->close();


                                        ?>

                                         <tr>
                                                    <td>TOTAL</td>
                                                    <td></td>
                                                    <td></td>
                                                  
                                                    <td><?=$total?></td>
                                                
                                        
                                                </tr>



                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                      
                       
                    </div>
                </main>
            <?php  include('inc/footer.php'); ?>