<?php
include "../db/db.php";
session_start();
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql =mysqli_query($db,"SELECT * FROM Admin WHERE admin_name = '$username' AND admin_password = '$password'");
  if(mysqli_num_rows($sql) > 0){
    $fetch = mysqli_fetch_assoc($sql)['admin_name'];
    $_SESSION['admin_name'] = $fetch;
    header("location: ../home.php");
  }else{
    echo "Username or password is incorrect!";
  }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>R D L</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
      }
      
      .login-form {
        width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      
      .login-form h2 {
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
        width: 95%;
        padding: 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        outline: none;
      }
      
      .form-group button {
        width: 100%;
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
      
      .signup-link {
        text-align: center;
      }
      
      .signup-link a {
        color: #007bff;
        text-decoration: none;
      }
      
      .signup-link a:hover {
        text-decoration: underline;
      }
      
  </style>
</head>
<body>
  <div class="login-form">
    <h2>Sign IN</h2>
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
        <button type="submit" name="submit">Sign in</button>
      </div>
    </form>
    <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>
</body>
</html>
