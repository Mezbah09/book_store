<?php 
require_once 'header.php';


?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                        
                    </div>
                    
                </div>
                
                <div class="row animated fadeInUp">
                   <div class="col-sm-12">
                       .
                       <div class="row">
                           <?php 
                           $books= mysqli_query($con, "SELECT * FROM `books`");
                           $total_books= mysqli_num_rows($books);
                           ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-1">
                            <a href="manage-book.php">
                                <div class="panel-content">
                                    <h1 class="title color-w"><i class="fa fa-book"></i> <?=$total_books; ?></h1>
                                    <h4 class="subtitle color-lighter-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                    <?php 
                           $books_qty= mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM `books`");
                           $qty= mysqli_fetch_assoc($books_qty);
                           ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-book"></i><?=$qty['total']; ?></h1>
                                    <h4 class="subtitle">Total Books Quantity</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                    <?php 
                           $user= mysqli_query($con,"SELECT * FROM `user`");
                           $total_user= mysqli_num_rows($user);
                           ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-user"></i> <?=$total_user; ?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Admin</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>
                   </div>
                </div>

                <?php 
                require_once 'footer.php';
                ?>