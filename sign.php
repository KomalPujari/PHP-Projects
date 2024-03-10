<?php
$success = 0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];



    $sql="SELECT * from `registration` WHERE username='$username'";
    $result=mysqli_query($conn, $sql);

    if($result){
        $num=mysqli_num_rows($result);
        if($num> 0){
            $user=1 ;
        }else{
            $sql= "INSERT INTO `registration`(username,password) VALUES ('$username','$password')";
            $result=mysqli_query($conn, $sql);
            if($result){
                // echo "Signup Successfull";
                $success=1;
            }else{
                die(mysqli_error($conn));
            }
        }
    }
}
?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>Sign-up</title>
  </head>
  <body>
  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh Sorry!</strong> User already exist.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>' ;
  }
 ?>
   <?php
  if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> User Registered.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>' ;
  }

  ?>

    <h1 class="text-center my-3">Sign Up Now</h1>
<div class="container my-5">
<form method="post" action="sign.php">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary w-100">Sign up</button>
</form>
</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
  </body>

</html>