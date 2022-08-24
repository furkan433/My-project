<?php

  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  $database_connection =  mysqli_connect("localhost", "root", "", "wti-web-dev");

  $insert_query = "INSERT INTO users(name, email, password) VALUES ('$user_name','$user_email','$user_password')";

  mysqli_query($database_connection, $insert_query);

   header('location: register.php');
 ?>
