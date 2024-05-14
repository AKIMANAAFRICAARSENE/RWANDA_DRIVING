<?php
include "../db/db.php";
session_start();
if (isset($_SESSION['admin_name'])) {
    header('location: ./signup.php');
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm_password'];

    if($c_password === $password){
      $check = mysqli_query($db,"SELECT * FROM admin WHERE admin_name='{$username}'");
      if (mysqli_num_rows($check) > 0) {
        echo "username already exists";
      } else{
        $add = mysqli_query($db,"INSERT INTO admin(admin_name, admin_password) VALUES('{$username}','{$password}')");
        if ($add) {
          $select = mysqli_query($db,"SELECT * FROM admin WHERE admin_name ='{$username}' AND admin_password ='{$password}'");
          $fetch = mysqli_fetch_assoc($select)['admin_name'];
          $_SESSION['admin_name'] = $fetch;
          header("location: ../home.php");
        } 
      }

    } else{
      echo"use the password on password";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>R D L</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
      }
      
      .signup-form {
        width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      
      .signup-form h2 {
        text-align: center;
      }
      
      .form-group {
        margin-bottom: 20px;
      }
      
      .form-group label {
        display: block;
        margin-bottom: 5px;
      }
      
      .form-group input {
        width: 90%;
        padding: 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        outline: none;
        font-size: 15px;
      }
      
      .form-group button {
        width: 95%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      .form-group button:hover {
        background-color: #0056b3;
      }
      
  </style>
</head>
<body>
  <div class="signup-form">
    <h2>Sign Up</h2>
    <form action="#" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm_password" required>
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Sign Up</button>
      </div>
    </form>
  </div>
</body>
</html>
