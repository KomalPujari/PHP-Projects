<?php
$login = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="SELECT * from `registration` WHERE username='$username' && password='$password'";
    $result=mysqli_query($conn, $sql);

    if($result){
        $num=mysqli_num_rows($result);
        if($num> 0){
            // echo "Login Successfull";
            $login = 1;
        }else{
        //  echo"Invalid data";
        $invalid = 1;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login in</title>
  </head>
  <body>

  <?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>login Successfull!</strong>  Welcome.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>' ;
  }
 ?>
   <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops! Invalid Data</strong> Try again
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>' ;
  }

  ?>



    <h1 class="text-center my-3">Log in Now</h1>
<div class="container my-5">
<form method="post" action="login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Log in</button>
</form>
</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
  </body>

</html>