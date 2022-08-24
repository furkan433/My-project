<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honesty Shoping</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="ragister.css">
</head>

<body>
    <div class="reg">


      <?php

                  $errname = $errphone = $erremail =  $errpass = $errrepass = $errpic = $erraddress =  "";

                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(empty($_POST['name'])){
                      $errname = "your name field is required";
                    }
                    elseif(empty($_POST['phone'])){
                      $errphone = "your phone number field is required";
                    }
                    elseif(empty($_POST['email'])){
                      $erremail = "your email field is required";
                    }
                    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                      $erremail = "please enter your valid email address!";
                    }
                    elseif(empty($_POST['password'])){
                      $errpass = "your password field is required";
                    }
                    elseif(empty($_POST['password']==$_POST['psw-repeat'])){
                      $errrepass = "your password field is not same";
                    }
                    elseif(empty($_POST['picture'])){
                      $errpic = "your picture field is required";
                    }
                    elseif(empty($_POST['address'])){
                      $erraddress = "your address field is required";
                    }
                    else{
                      $user_name = $_POST['name'];
                      $user_phone = $_POST['phone'];
                      $user_email = $_POST['email'];
                      $user_password = $_POST['password'];
                      $user_psw_repeat = $_POST['psw-repeat'];
                      $user_picture = $_POST['picture'];
                      $user_address = $_POST['address'];
                      $database_connection =  mysqli_connect("localhost", "root", "", "shopping");

                      $insert_query = "INSERT INTO reginfo(fullname, phonenum, email, password, picture, Address)
                       VALUES ('$user_name','$user_phone','$user_email]','$user_password','$user_picture','$user_address')";

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




        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="post">
            <h2>Ragistation Form</h2>
            <p>Please fill in this form to create an account.</p>

            <label for="name"><b>Full name</b></label>
            <input id="name" type="text" placeholder="Enter Your Name" name="name">
            <span style="color:red; font-size:10px"> <?php echo $errname; ?> </span>

            <label for="Phone number"><b>Phone Number</b></label>
            <input type="text" placeholder="Enter Phone number" name="phone">
            <span style="color:red; font-size:10px"> <?php echo $errphone; ?> </span>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email">
            <span style="color:red; font-size:10px"> <?php echo $erremail; ?> </span>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password">
            <span style="color:red; font-size:10px"> <?php echo $errpass; ?> </span>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat">
            <span style="color:red; font-size:10px"> <?php echo $errrepass; ?> </span>

            <div class="mb-3">
                <label for="formFile" class="form-label">Your picture</label>
                <input class="form-control" type="file" id="formFile" name="picture">
                <span style="color:red; font-size:10px"> <?php echo $errpic; ?> </span>
            </div>

            <label for="address"><b>Addres</b></label>
            <textarea class="form-control" id="address" rows="1" name="address"></textarea>
            <span style="color:red; font-size:18px"> <?php echo $erraddress; ?> </span>

            <button type="submit" class="cancelbtn">Ragister</button>
            <p>if You are ragister member please <a href="login.php">Log in</a></p>
        </form>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</body>

</html>
