<?php 
require_once'./dbcon.php';
if(isset($_POST['Registration'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $usename=$_POST['username'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];

    $input_error=array();

    if(empty($name)){
        $input_error['name']="The Name field is required";
    }
    if(empty($email)){
        $input_error['email']="The Email field is required";
    }
    if(empty($username)){
        $input_error['username']="The Username field is required";
    }
    if(empty($password)){
        $input_error['password']="The Password field is required";
    }
    if(empty($c_password)){
        $input_error['c_password']="The Conform Password field is required";
    }
    if(count($input_error)==0){
        $email_chack=mysqli_query($con,"SELECT * FROM'USER'WHERE 'email'");
    }
    $query="INSERT INTO `user`(`name`, `email`, `username`, `password`, `status`) VALUES('$name','$email','$username','$password''inactive')";
    $result=mysqli_query($con,$query);

}
?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>User Registration Form</title>
  </head>
  <body>
   <div class="container">
   <br/>
   <h1>User Registration Form</h1>
   <hr/>
   <br/>
    <div class="row">
      <div class="col-md-12">
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
      <div class="row mb-3">
        <label for="name" class="col-sm-1 col-form-label    col-form-label-sm">Name</label>
             <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="name" placeholder="Enter Your Name">
            </div>
            <label class="error">
            <?php 
            if(isset($input_error['name'])){ 
                echo $input_error['name'];}?>
            </label>
         </div>
         <div class="row mb-3">
        <label for="email" class="col-sm-1 col-form-label    col-form-label-sm">Email</label>
             <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="email" placeholder="Enter Your Email">
            </div>
            <label class="error">
            <?php 
            if(isset($input_error['email'])){ 
                echo $input_error['email'];}?>
            </label>
            
         </div>
         <div class="row mb-3">
        <label for="username" class="col-sm-1 col-form-label    col-form-label-sm">Username</label>
             <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm" id="username" placeholder="Enter Your Username">
            </div>
            <label class="error">
            <?php 
            if(isset($input_error['username'])){ 
                echo $input_error['username'];}?>
            </label>
         </div>
         <div class="row mb-3">
        <label for="password" class="col-sm-1 col-form-label    col-form-label-sm">Password</label>
             <div class="col-sm-4">
                <input type="password" class="form-control form-control-sm" id="password" placeholder="Enter Your Password">
                <label class="error">
            <?php 
            if(isset($input_error['password'])){ 
                echo $input_error['password'];}?>
            </label>
            </div>
         </div>
         <div class="row mb-3">
        <label for="c_password" class="col-sm-1 col-form-label    col-form-label-sm">Conform Password</label>
             <div class="col-sm-4">
                <input type="password" class="form-control form-control-sm" id="c_password" placeholder="Enter Your Conform Password">
            </div>
            <label class="error">
            <?php 
            if(isset($input_error['c-password'])){ 
                echo $input_error['c_password'];}?>
            </label>
         </div>
         <div class="col-sm-4 ">
            <input type="submit" value="Ragistration" name="registration" class="btn btn-dark">
         
         </div>
        
        </div>
      </form>
      </div>
    </div>
    
    </div>
    
   </div>
   <hr/>
   <br/>
   <div class="text-center">
   <p>If you have an account? then please <a href="login.php">Login</a></p>
   </div>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>