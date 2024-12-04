<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Varela+Round&display=swap" rel="stylesheet"/>
</head>
<style>
    body {
    font-family: Karla, Arial, sans-serif;
  }

  .container {
    border-radius: 10px;
    background-image: url(assets/index_bg.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    margin-top: 15px;
    margin-left: 10px;
    margin-right: 10px;
    padding-top: 3px;
    padding-bottom: 3px;
    height: 95vh;
    text-align: center;
    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
  }

  .logo {
    color: white;
    font-size: 60px;
    margin-bottom: 400px;
  }

  .start-btn {
    border-color: white;
    border-radius: 10px;
    background-color: transparent;
    color: white;
    padding: 20px;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease; 
  }

  .start-btn:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }
</style>
<body>
    <div class="container">
        <div class="intro">
            <h1 class="logo">Welcome to Bread&Coffee</h1>
            <a href="selection.php"><button class="start-btn">Start Your Order</button></a>
        </div>
    </div>
</body>
</html>