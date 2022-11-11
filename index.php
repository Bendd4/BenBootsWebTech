<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

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
        <a class="navbar-brand" href="index.php">BENBOOTS SHOP</a>
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
      
  <div class="img" id="thumbnail">
    <div class="bg-img">
      <h>Welcome to BENBOOTS</h>
    </div>
  </div>

<div class="ex">
    <h1 class="title">Men Best Sell</h1>
    <div class="bs-cen">
      <div class="bs"  onclick="window.location.href='../detail.php';">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
      <div class="bs">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
      <div class="bs">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
         <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
    </div>
    <h1 class="title">Women Best Sell</h1>
    <div class="bs-cen">
      <div class="bs"  onclick="window.location.href='../detail.php';">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
      <div class="bs">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
      <div class="bs">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
    </div>
    <h1 class="title">Kids Best Sell</h1>
    <div class="bs-cen">
      <div class="bs"  onclick="window.location.href='../detail.php';">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
      <div class="bs">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
          <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
      <div class="bs">
        <img class="img-pro" src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503">
        <div>
          <h2 class="txt-pro">Product name</h2>
         <h4 class="txt-pro">Product detail</h4>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
