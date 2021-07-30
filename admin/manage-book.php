<?php 
require_once 'header.php';
require_once './dbcon.php';


?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Book</a></li>
                        </ul>
                        
                    </div>
                    
                </div>



                
                
                <div class="row animated fadeInRight">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book image</th>
                                        <th>Book Author Name</th>
                                        <th>Book Publication Name</th>
                                        <th>Book purchase date</th>
                                        <th>Book Price</th>
                                        <th>Book quantity</th>
                                        <th>Available quantity</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        $result=mysqli_query($con,"SELECT * FROM books");
                                    
                                        
                                        while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?=$row['book_name'] ?></td>
                                            <td><img style="width:50px;" src="../images/books/<?= $row['book_image'] ?>" /></td>
                                            <td><?=$row['book_author_name'] ?></td>
                                            <td><?=$row['book_publication_name'] ?></td>
                                            <td><?=$row['book_purchase_date'] ?></td>
                                            <td><?=$row['book_price'] ?></td>
                                            <td><?=$row['book_qty'] ?></td>
                                            <td><?=$row['available_qty'] ?></td>
                                            
                                        </tr>
                                        <?php  

                                    
                                        }
                                        ?>

 
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <?php 
                require_once 'footer.php';
                ?>