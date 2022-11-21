<?php error_reporting(0); ?>
<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title>Product for ' . $_GET['gender'] .'</title>';
    ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="search.css" rel="stylesheet">
  
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
            <a class="nav-link" href="search.php?gender=men">MEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php?gender=women">WOMEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php?gender=kids">KIDS</a>
          </li>
        </ul>
        <a class="navbar-brand" href="index.php">BENBOOTS SHOP</a>
        <ul class="navbar-nav float-right"> 
          <li class="nav-item">
           <?php
               if(isset($_SESSION['name'])){
                 echo '<a class="nav-link" href="cart.php">CART</a>';
               }
              else{
                echo '<a class="nav-link" href="Login/login.php" >CART</a>';
              }
            ?>
          </li>
          <li class="nav-item">
            <?php
               if(isset($_SESSION['name'])){
                 echo '<a class="nav-link" href="user.php" >'.$_SESSION['name'].'</a>';
               }
              else{
              
                echo '<a class="nav-link" href="Login/login.php">LOGIN</a>';
              }
            ?>
          </li>
        </ul>
  </nav>
      
  <div class="container-fluid usable">
    <div class="row">
      <div class="col-lg-3 bg-dark" id="search">
        
          <?php
            echo '<form action="search.php?gender=' . $_GET['gender'] . '" method="post">';
          ?>

        <h2>Brand</h2>
        <div class="form-check">
            <input class="form-check-input dark" type="checkbox" value="Nike" id="Brand1" name="brand[]" 
            <label class="form-check-label" for="Brand1">
              Nike
            </label> 
        </div>
        <div class="form-check">
            <input class="form-check-input check checkbox-black" type="checkbox" value="Adidas" id="Brand2" name="brand[]">
            <label class="form-check-label" for="Brand2">
              Adidas
            </label> 
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Fila" id="Brand3" name="brand[]">
            <label class="form-check-label" for="Brand3">
              Fila
            </label> 
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Skechers" id="Brand4" name="brand[]">
            <label class="form-check-label" for="Brand4">
              Skechers
            </label>
        </div>
        <br>
        <h2>Price Range</h2>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="300" id="Price" name="price">
            <label class="form-check-label" for="Price">
              300฿ - 600฿
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="600" id="Price" name="price">
            <label class="form-check-label" for="Price">
              600฿ - 900฿
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="900" id="Price" name="price">
            <label class="form-check-label" for="Price">
              900฿ - 1200฿
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="1200" id="Price" name="price">
            <label class="form-check-label" for="Price">
              1200฿ - 1500฿
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="1500" id="Price" name="price">
            <label class="form-check-label" for="Price">
              >1500฿
            </label>
        </div>
        <button type="submit" class="btn btn-success">Search</button>  
        </form>
        <!-- https://www.w3schools.com/php/php_filter_advanced.asp -->
        
      </div>
      <div class="col-lg-9" id="itemcat">
      <?php
        echo '<h1 class="topic">'. strtoupper($_GET['gender']) .'</h1>';
      ?>
    <br>
    <br>
    <section id="item">
      <div class="item-container">
    <?php
    $file = file_get_contents( $_GET['gender'] . '.json' );
    
    $data = json_decode( $file );
    switch ($_POST['price']) {
      case "300":
        $minP = 300;
        $maxP = 600;
        break;
      case "600":
        $minP = 600;
        $maxP = 900;
        break;
      case "900":
        $minP = 900;
        $maxP = 1200;
        break;
      case "1200":
        $minP = 1200;
        $maxP = 1500;
        break;
      case "1500":
        $minP = 1500;
        $maxP = 99999;
        break;
      default:
        $minP = 0;
        $maxP = 99999;
    }
    // ระบบกรอง
    if (isset($_POST['brand'])){
      
    foreach($_POST['brand'] as $filbrand){
      for( $i=0; $i<count( $data ); $i++ ) {
          $brand = $data[$i]->brand;
          $shoes = $data[$i]->shoes;
          if($brand == $filbrand){
            for( $j=0; $j<count($shoes); $j++ ){
              $shoePrice = $shoes[$j]->price;
              if(($shoePrice >= $minP) && ($shoePrice <= $maxP)){
                $shoeName = $shoes[$j]->name;
                echo "<a href='detail.php?gender=". $_GET['gender'] ."&name=" . $shoeName . "' class='card'>";
                  echo '<img src="picture/' . $_GET['gender'] . '/' . $shoeName . '.jpg" alt="">';
                  echo '<div class="des">';
                    echo '<h5>'. $brand .'</h5>';
                    echo '<h4>'. $shoeName .'</h4>';
                    echo '<h3>'. $shoePrice . '฿' .'</h3>';
                  echo '</div>';
                echo'</a>';
              }
            }
          }         
        }   
      }
    }

    else{
      for( $i=0; $i<count( $data ); $i++ ) {
        $brand = $data[$i]->brand;
        $shoes = $data[$i]->shoes;
        for( $j=0; $j<count($shoes); $j++ ){
          $shoePrice = $shoes[$j]->price;
          if(($shoePrice >= $minP) && ($shoePrice <= $maxP)){
            $shoeName = $shoes[$j]->name;
            echo "<a href='detail.php?gender=". $_GET['gender'] ."&name=" . $shoeName . "' class='card'>";
              echo '<img src="picture/' . $_GET['gender'] . '/' . $shoeName . '.jpg" alt="">';
              echo '<div class="des">';
                echo '<h5>'. $brand .'</h5>';
                echo '<h4>'. $shoeName .'</h4>';
                echo '<h3>'. $shoePrice . '฿' .'</h3>';
              echo '</div>';
            echo'</a>';
          }
        }
      }
    }
    ?>
      </div>
    </section>
        
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-container">
      <div class="footer-brand-container">
        <div class="footer-brand">Benboots</div>
        <span>FOLLOW US</span>
        <div class="footer-social">
          <a href="#"><i class="fab fa-facebook-f"></i></a> 
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a> 
        </div>
      </div>

      <div class="footer-menu">
        <div class="footer-menu-box">
        <strong>ABOUT BENBOOTS SHOP</strong>
        <p>BENBOOTS SHOP ตัวแทนจำหน่ายรองเท้าแตะสำหรับสุภาพบุรุษ สุภาพสตรี และ เด็ก<br>
          ที่คัดสรรสินค้าคุณภาพจากหลายแบรนด์ดังมารวมไว้ที่นี่ที่เดียว <br>
          ท่านสามารถหาซื้อรองเท้าที่ท่านสนใจได้ตามที่ต้องการ</p>
        </div>

        <div class="footer-menu-box">
        <strong>ABOUT US</strong>
        <p>นาย อนุวัฒน์ ประสิทธิ์ 64070115</p>
        <p>นาย อัคภพ คุณกิตติ 64070117</p>
        <p>นาย เอกณัฐ หิรัญนุชนาถ 64070118</p>
        <p>นางสาว กชกร นิลกำเเหง 64070120</p>
        <p>นาย จีรชยา เจริญผล 64070131</p>
        <p><strong>Faculty of Information Technology<br>
            King Mongkut's Institute of Technology Ladkrabang</strong></p>
        </div>

        <div class="footer-menu-box">
        <strong>PRODUCT</strong>
        <ul>
          <li><a href="search.php?gender=men">MEN</a></li>
          <li><a href="search.php?gender=women">WOMEN</a></li>
          <li><a href="search.php?gender=kids">KIDS</a></li>
        </ul>
        </div>
      </div>

    </div>
    <hr><span class="copyright">© IT.37 BenBoots Shop</span> 
  </footer>



      
  
</body>
</html>
