<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women</title>

    <link href="index.css" rel="stylesheet">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">

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
      





      
  
</body>
</html>
