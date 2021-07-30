<?php 
require_once'./dbcon.php';
session_start();

if(isset($_SESSION['user_login'])){
  header('location:index.php');
  }


if(isset($_POST['Login'])){
  $username= $_POST['username'];
    $password= $_POST['password'];

  $username_check=mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username'");
  if(mysqli_num_rows($username_check) >0){
    $row =mysqli_fetch_assoc($username_check);

    if($row['password']==md5($password)){
      if($row['status']=='active'){
        $_SESSION['user_login']=$username;
        header('location:index.php');
      } else{
        $status_inactive="Your status is inactive";
      }
    } else{
      $wrong_password ="This password is wrong";
    }

  
  }else{
    $username_not_found="This username are not found";
  }

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

    <title>Book Store Management System</title>
  </head>
  <body>
    <div class="container">
    <br/>
    <h1 class="text-center">Book Store Management System</h1>
    <br/>
    <div class="row">
        <div class="col-md-4 offset-md-4">
        <h2 class="text-center">Admin Login Form</h2>
            <form action="login.php" method="POST">
                <div>
                    <input type="text" placeholder="username" name="username" required="" value="<?php if(isset($username)){echo $username;}?>"  class="form-control" />
                </div>
                <div>
                    <input type="password" placeholder="password" name="password" required="" value="<?php if(isset($password)){echo $password;}?>" class="form-control" />
                </div>
                <br/>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" value="Login" name="Login" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
    <br>
    <?php if(isset($username_not_found)){
                  echo '<div class="alert alert-danger col-md-4 offset-md-4">'.$username_not_found.'</div>';} ?>
        <?php if(isset($wrong_password)){
                  echo '<div class="alert alert-danger col-md-4 offset-md-4">'.$wrong_password.'</div>';} ?>   
          <?php if(isset($status_inactive)){
                  echo '<div class="alert alert-danger col-md-4 offset-md-4">'.$status_inactive.'</div>';} ?>        
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