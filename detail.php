<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <link href="detail.css" rel="stylesheet">
  
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
   <div class="container-fluid usable">
  <div class="detail">
    <div class="proimage">
      <div class="product">
      <img src="https://static-ssp.supersports.co.th/media/catalog/product/s/s/SSP61716445_3.jpg?impolicy=resize&width=440" alt="">
      </div><br><br>
      <hr style="height:6px;border-width:0;color:white;">
      <div class="size">
        <img src="https://static-ssp.supersports.co.th/media/catalog/product/s/s/SSP61716445_5.jpg?impolicy=resize&width=440" alt="">
      </div>
    </div>
    
    <div class="prodetail">
      <div class="wish">
        <button>ADD TO WISHLIST</button>
      </div>
      <h1>BEN BABYBEN</h1>
      <h2>bendidas<h2><br>
      <h3>SIZE<h3>
      <select>
        <option>Select Size</option>
        <option>S</option>
        <option>M</option>
        <option>L</option>
        <option>XL</option>
      </select>
        
      <br>   
      <h3>NUMBER OF ITEM</h3>
      <input type="number" value="1">

      <br><br><br><br><br>
      <h3>PRICE</h3>
      <h3>1,100 B</h3>
      <div class="add">
        <button>ADD TO CART</button>
      </div>

    </div> 
      </div>
   <?php
    echo$_GET['men']."hahahahaha";


?>
</body>
</html>