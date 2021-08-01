<?php 
require_once './dbcon.php';

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