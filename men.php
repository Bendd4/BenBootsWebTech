<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men</title>

    <link href="../search.css" rel="stylesheet">
  
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
      
  <div class="container-fluid usable">
    <div class="row">
      <div class="col-lg-3 bg-dark" id="search">
        
        <form action="men.php" method="post">
          <?php


          ?>
        <p class="col-lg-3">Brand</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Nike" id="Brand1">
            <label class="form-check-label" for="Brand1">
              Nike
            </label> 
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Adidas" id="Brand2">
            <label class="form-check-label" for="Brand2">
              Adidas
            </label> 
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Fila" id="Brand3">
            <label class="form-check-label" for="Brand3">
              Fila
            </label> 
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Skechers" id="Brand4">
            <label class="form-check-label" for="Brand4">
            Skechers
            </label> 
          
        </div>
        <button type="submit" class="btn btn-success">Search</button>  
        </form>
        <!-- https://www.w3schools.com/php/php_filter_advanced.asp -->
        
      </div>
      <div class="col-lg-9" id="itemcat">
        <h1 class="topic">MEN</h1>
    <br>
    <br>
    <section id="item">
      <div class="item-container">
    <?php
    $file = file_get_contents('men.json');
    $data = json_decode( $file );
    for( $i=0; $i<count( $data ); $i++ ) {
        $brand = $data[$i]->brand;
        // echo $brand."<br/>";
        $shoes = $data[$i]->shoes;

        for( $j=0; $j<count($shoes); $j++ ){
          $shoePrice = $shoes[$j]->price;
          $shoeName = $shoes[$j]->name;
          // echo $shoeName."<br>";  


          // ' . 'onclick="window.location.href=' . "' ../detail.php '" . ';"


          // echo "<div class='card'><a href='detail.php?men=" . $shoeName . "'>";
          echo "<a href='detail.php?men=" . $shoeName . "' class='card'>";
          // echo "<a href='detail.php?men=" . $shoeName . "'><div class='card'>";
          // ใส่รูปใน link นั้นเอาหละมั้ง
            echo '<img src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t31.18172-8/210992_100183006801959_711567220_o.jpg?_nc_cat=106&ccb=1-7&_nc_sid=de6eea&_nc_ohc=ZtaGKqWQmOMAX9Z1BCC&_nc_ht=scontent.fbkk7-2.fna&oh=00_AfD5crCL8sbYcbuK3BNGWxLua_d1qgOpQJhd54ImBNRMXg&oe=63919503" alt="">';
            echo '<div class="des">';
              echo '<h5>'. $brand .'</h5>';
              echo '<h4>'. $shoeName .'</h4>';
              echo '<h3>'. $shoePrice . '฿' .'</h3>';
            echo '</div>';
            echo '<a href="../detail.php"><i class="fas fa-shopping-cart"></i></a>';//อันนี้มันไม่ติดนะ
        echo'</a>';
          // echo '</a></div>';
          
       
          // <!--        ****************************************************************************************
          //   เอาไว้ส่งตัวเเปรจาก php อันที่ 1 ไปอันที่ 2
          //   https://stackoverflow.com/questions/13135131/php-getting-variable-from-another-php-file
          //   **************************************************************************************** -->
          
        }
    }


  



?>
      </div>
    </section>
        
      </div>
    </div>
  </div>




      
  
</body>
</html>
