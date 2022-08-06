<?php include('inc/header.php')?>
<?php include('inc/sidebar.php')?>



      
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">View User</h1>
                        
                        <div class="row">

                              <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            
                                            <th>User name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>

                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>

                                        <?php 

                                            include('inc/db_connect.php'); 

                                            $sql = "SELECT * FROM tbl_user WHERE type='user'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) { $count=1; ?> 

                                                 <tr>
                                                    <td><?=$count?></td>
                                                   
                                                    <td><?=$row['name']?></td>
                                                    <td><?=$row['email']?></td>
                                                    <td><?=$row['mobile']?></td>
                                                  
                                                    <td><a href="edit_user.php?id=<?=$row['id']?>"><button class="btn btn-success">Edit</button></a></td>
                                                    <td><a href="delete_user.php?id=<?=$row['id']?>"><button class="btn btn-danger">Delete</button></a></td>
                                        
                                                </tr>

                                                
                                             <?php 
                                                 $count++; }
                                                } else {
                                                  echo "0 results";
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