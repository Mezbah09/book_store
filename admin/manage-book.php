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
          <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
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

              $result = mysqli_query($con, "SELECT * FROM books");
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?= $row['book_name'] ?></td>
                  <td><img style="width:50px;" src="../images/books/<?= $row['book_image'] ?>" /></td>
                  <td><?= $row['book_author_name'] ?></td>
                  <td><?= $row['book_publication_name'] ?></td>
                  <td><?= $row['book_purchase_date'] ?></td>
                  <td><?= $row['book_price'] ?></td>
                  <td><?= $row['book_qty'] ?></td>
                  <td><?= $row['available_qty'] ?></td>
                  <td>

                    <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'] ?>"><i class="fa fa-eye"></i></a>
                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                    <a href="delete.php?bookdelete=<?= base64_encode($row['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
                  </td>


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

$result = mysqli_query($con, "SELECT * FROM books");
while ($row = mysqli_fetch_assoc($result)) {
?>
  <!-- Modal -->
  <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header state modal-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <th>Book Name</th>
              <td><?= $row['book_name'] ?></td>

            </tr>
            <tr>
              <th>Book image</th>
              <td><img style="width:100px;" src="../images/books/<?= $row['book_image'] ?>" /></td>


            </tr>
            <tr>
              <th>Book Author Name</th>
              <td><?= $row['book_author_name'] ?></td>


            </tr>
            <tr>
              <th>Book Publication Name</th>
              <td><?= $row['book_publication_name'] ?></td>


            </tr>
            <tr>
              <th>Book purchase date</th>
              <td><?= $row['book_purchase_date'] ?></td>


            </tr>
            <tr>
              <th>Book Price</th>
              <td><?= $row['book_price'] ?></td>

            </tr>
            <tr>
              <th>Book quantity</th>
              <td><?= $row['book_qty'] ?></td>

            </tr>
            <tr>
              <th>Available quantity</th>
              <td><?= $row['available_qty'] ?></td>
            </tr>

          </table>

        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php

}
?>

<?php

$result = mysqli_query($con, "SELECT * FROM books");
while ($row = mysqli_fetch_assoc($result)) {

  //     $id = $row['id'];
  //    $book_info =mysqli_query($con,"SELECT * FROM `books` WHERE 'id'='$id'");
  //    $book_info_row=mysqli_fetch_assoc($book_info);
?>
  <!-- Modal -->
  <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header state modal-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Information</h4>
        </div>
        <div class="modal-body">

          <div class="panel">

            <div class="panel-content">
              <div class="row">
                <div class="col-md-12">
                  <form method="post" action="">

                    <div class="form-group">
                      <label for="book_name">Book Name</label>

                      <input type="text" name="book_name" class="form-control" id="book_name" placeholder="Book Name" value="<?= $row['book_name'] ?>" required>
                      <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>" required>

                    </div>
                   
                    <div class="form-group">
                      <label for="book_author_name">Book Author Name</label>

                      <input type="text" name="book_author_name" class="form-control" id="book_author_name" placeholder="Book Author Name" value="<?= $row['book_author_name'] ?>" required>

                    </div>
                    <div class="form-group">
                      <label for="book_publication_name">Book publication name</label>

                      <input type="text" name="book_publication_name" class="form-control" id="book_publication_name" placeholder="Book publication name" value="<?= $row['book_publication_name'] ?>" required>

                    </div>
                    <div class="form-group">
                      <label for="book-purchase_date">Book purchase date</label>

                      <input type="date" name="book_purchase_date" class="form-control" id="book_purchase_date" placeholder="Book purchase date" value="<?= $row['book_purchase_date'] ?>" required>

                    </div>
                    <div class="form-group">
                      <label for="book_price">Book price</label>

                      <input type="number" name="book_price" class="form-control" id="book_price" placeholder="book_price" value="<?= $row['book_price'] ?>" required>

                    </div>
                    <div class="form-group">
                      <label for="book_qty">Book qty</label>

                      <input type="number" name="book_qty" class="form-control" id="book_qty" placeholder="book_qty" value="<?= $row['book_qty'] ?>" required>

                    </div>
                    <div class="form-group">
                      <label for="available_qty">Available qty</label>

                      <input type="number" name="available_qty" class="form-control" id="available_qty" placeholder="Available qty" value="<?= $row['available_qty'] ?>" required>

                    </div>


                    <div class="form-group">
                      <button type="submit" name="update-book" class="btn btn-primary"> <i class="fa fa-save"></i> Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>

<?php

}
if(isset($_POST['update-book'])){
  $id=$_POST['id'];
  $book_name=$_POST['book_name'];
  $book_author_name=$_POST['book_author_name'];
  $book_publication_name=$_POST['book_publication_name'];
  $book_purchase_date=$_POST['book_purchase_date'];
  $book_price=$_POST['book_price'];
  $book_qty=$_POST['book_qty'];
  $available_qty=$_POST['available_qty'];
  
  $result=mysqli_query($con, "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id`='$id' ");
  

}
?>


<?php
require_once 'footer.php';
?>
