<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <style>
        body{
            color: white;
            font-family: 'Changa', sans-serif;
        }
        .dark{
            background-color: black;
        }
    </style>
</head>
<body class="dark">
<!-- Nav Bar (TOP) -->
  <nav class="navbar navbar-expand-lg navbar-dark dark fixed-top">
    <div class="container-fluid">
        <ul class="navbar-nav float-left">
          <li class="nav-item">
            <a class="nav-link" href="../men.php">MEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../women.php">WOMEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../kids.php">KIDS</a>
          </li>
        </ul>
        <a class="navbar-brand" href="../index.php">BENBOOTS SHOP</a>
        <ul class="navbar-nav float-right"> 
          <li class="nav-item">
            <a class="nav-link" href="#">CART</a>
          </li>
          <li class="nav-item">
            <?php
               if(isset($_SESSION['name'])){
                 echo '<a class="nav-link" href="../Login/login.php" >'.$_SESSION['name'].'</a>';
               }
              else{
                echo '<a class="nav-link" href="../Login/login.php" >LOGIN</a>';
              }
            ?>
          </li>
        </ul>
  </nav>

    <div class="container dark" style="width: 50%;">
        <h3 class="mt-4 text-center">Register</h3>
        <hr>
        <form  action="register_process.php" method="post">
        <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label  class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" >
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" >
            </div>
           
           
            <button type="submit" name="register" class="btn btn-secondary text-white float-right">Register</button>
        </form>
        <hr>
        <p>Already have an account? <a href="../Login/login.php">Click here to login</a></p>
    </div>
    
</body>
</html>