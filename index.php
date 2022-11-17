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
            <a class="nav-link" href="../search.php?gender=men">MEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../search.php?gender=women">WOMEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../search.php?gender=kids">KIDS</a>
          </li>
        </ul>
        <a class="navbar-brand" href="../index.php">BENBOOTS SHOP</a>
        <ul class="navbar-nav float-right"> 
          <li class="nav-item">
            <a class="nav-link" href="../cart.php">CART</a>
          </li>
          <li class="nav-item">
            <?php
               if(isset($_SESSION['name'])){
                 echo '<a class="nav-link" href="../user.php" >'.$_SESSION['name'].'</a>';
               }
              else{
                echo '<a class="nav-link" href="../Login/login.php" >LOGIN</a>';
              }


            ?>
          </li>
        </ul>
  </nav>
      
  <div class="img usable" id="thumbnail">
    <div class="bg-img">
      <h>Welcome to BENBOOTS</h>
    </div>
  </div>

  <div id="item">
    <h1 class="title">Men Best Sell</h1>
      <div class="item-container">
    <?php
      $file = file_get_contents( 'men.json' );
      $data = json_decode( $file );
      for( $i=0; $i < 3; $i++ ) {
          $brand = $data[$i]->brand;
          $shoes = $data[$i]->shoes;
              $shoePrice = $shoes[1]->price;
              $shoeName = $shoes[1]->name;
              echo "<a href='detail.php?gender=". 'men' ."&name=" . $shoeName . "' class='card'>";
                echo '<img src="../picture/' . 'men' . '/' . $shoeName . '.jpg" alt="">';
                echo '<div class="des">';
                  echo '<h5>'. $brand .'</h5>';
                  echo '<h4>'. $shoeName .'</h4>';
                  echo '<h3>'. $shoePrice . '฿' .'</h3>';
                echo '</div>';
            echo'</a>';

        }
    ?>
    </div>
  </div>
    
  <div id="item">
    <h1 class="title">Women Best Sell</h1>
      <div class="item-container">
    <?php
      $file = file_get_contents( 'women.json' );
      $data = json_decode( $file );
      for( $i=0; $i < 3; $i++ ) {
          $brand = $data[$i]->brand;
          $shoes = $data[$i]->shoes;
              $shoePrice = $shoes[1]->price;
              $shoeName = $shoes[1]->name;
              echo "<a href='detail.php?gender=". 'women' ."&name=" . $shoeName . "' class='card'>";
                echo '<img src="../picture/' . 'women' . '/' . $shoeName . '.jpg" alt="">';
                echo '<div class="des">';
                  echo '<h5>'. $brand .'</h5>';
                  echo '<h4>'. $shoeName .'</h4>';
                  echo '<h3>'. $shoePrice . '฿' .'</h3>';
                echo '</div>';
            echo'</a>';
        }
    ?>
    </div>
  </div>
    <div id="item">
    <h1 class="title">Kids Best Sell</h1>
      <div class="item-container">
    <?php
      $file = file_get_contents( 'kids.json' );
      $data = json_decode( $file );
      for( $i=0; $i < 3; $i++ ) {
          $brand = $data[$i]->brand;
          $shoes = $data[$i]->shoes;
              $shoePrice = $shoes[1]->price;
              $shoeName = $shoes[1]->name;
              echo "<a href='detail.php?gender=". 'kids' ."&name=" . $shoeName . "' class='card'>";
                echo '<img src="../picture/' . 'kids' . '/' . $shoeName . '.jpg" alt="">';
                echo '<div class="des">';
                  echo '<h5>'. $brand .'</h5>';
                  echo '<h4>'. $shoeName .'</h4>';
                  echo '<h3>'. $shoePrice . '฿' .'</h3>';
                echo '</div>';
            echo'</a>';
        }
    ?>
    </div>
  </div>
</body>
</html>
