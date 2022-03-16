<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="assets/lib/app.js" ></script>
  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white m-2 radius-10 shadow-sm">
  <a class="navbar-brand" href="#"><img src="assets/img/logo.svg" width="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link btn btn-light" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-light" href="login.php">login</a>
      </li>
      <?php
      if(isset($_SESSION['admin']) || isset($_SESSION['username'])){
        echo'<li class="nav-item">
        <a class="nav-link text-light btn btn-danger" href="?logout">logout</a>
      </li>';
    }
      ?>
    </ul>
   
  </div>
</nav>