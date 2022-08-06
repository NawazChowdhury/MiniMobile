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
                                            <th>Quantity</th>
                                            <th>Value</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>

                                        <?php 

                                            include('inc/db_connect.php'); 

                                            $sql = "SELECT * FROM tbl_product";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) { $count=1; ?> 

                                                 <tr>
                                                    <td><?=$count?></td>
                                                    <td><img style="width: 50px;height: 70px;"src="../<?=$row['p_image']?>" alt="<?=$row['p_name']?>"></td>
                                                    <td><?=$row['p_name']?></td>
                                                    <td><?=$row['p_price']?></td>
                                                    <td><?=$row['p_qty']?></td>
                                                    <td><?=$row['p_qty']*$row['p_price']?></td>
                                                    <td><?=substr($row['p_description'],0,50)?>...</td>
                                                    <td><a href="edit_product.php?id=<?=$row['p_id']?>"><button class="btn btn-success">Edit</button></a></td>
                                                    <td><a href="delete_product.php?id=<?=$row['p_id']?>"><button class="btn btn-danger">Delete</button></a></td>
                                        
                                                </tr>

                                                
                                             <?php 
                                                 $count++; }
                                                } else {
                                                 // echo "0 results";
                                                }
                                            $conn->close();


                                        ?>


                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                      
                       
                    </div>
                </main>
            <?php  include('inc/footer.php'); ?>