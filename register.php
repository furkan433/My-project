<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymo    us">

    <title>Registration form</title>

  </head>
  <body>



    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-3 mt-4">
          <?php

            $errname = $erremail = $errpass = "";

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              if(empty($_POST['user_name'])){
                $errname = "your name field is required";
              }elseif(empty($_POST['user_email'])){
                $erremail = "your email field is required";
              }elseif(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)){
                $erremail = "please enter your valid email address!";
              }
              elseif(empty($_POST['user_password'])){
                $errpass = "your password field is required";
              }else{
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                $database_connection =  mysqli_connect("localhost", "root", "", "wti-web-dev");

                $insert_query = "INSERT INTO users(name, email, password) VALUES ('$user_name','$user_email','$user_password')";

                if(mysqli_query($database_connection, $insert_query)){
                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong> Your registration is successfull! </strong>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>';

                }
              }

            }
           ?>


          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">User name</label>
              <input type="text" name="user_name" class="form-control" placeholder="Enter your name">
             <span style="color:red; font-size:18px"> <?php echo $errname; ?> </span>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">User Email </label>
              <input type="text" name="user_email" class="form-control"  placeholder="Enter your email">
              <span style="color:red; font-size:18px"> <?php echo $erremail; ?> </span>

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">User password</label>
              <input type="password" name="user_password" class="form-control" placeholder="Enter your password">
                <span style="color:red; font-size:18px"> <?php echo $errpass; ?> </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>



        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
