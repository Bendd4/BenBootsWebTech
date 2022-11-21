<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <link href="../index.css" rel="stylesheet">
    <style>
        body{
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
           <?php
               if(isset($_SESSION['name'])){
                 echo '<a class="nav-link" href="../cart.php">CART</a>';
               }
              else{
                echo '<a class="nav-link" href="../Login/login.php" >CART</a>';
              }
            ?>
          </li>
          <li class="nav-item">
            <?php
               if(isset($_SESSION['name'])){
                 echo '<a class="nav-link" href="../user.php" >'.$_SESSION['name'].'</a>';
               }
              else{
              
                echo '<a class="nav-link" href="../Login/login.php">LOGIN</a>';
              }
            ?>
          </li>
        </ul>
  </nav>

  
    <div class="container text-white" style="width: 50%;">
        <h3 class="mt-4 text-center">Login</h3>
        <hr>
        <form action="login_process.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label  class="form-label">Username</label>
                <input type="text" class="form-control" name="username" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-secondary">Login</button>
        </form>
        <hr>
        <p>Don't have an account? <a href="../Register/register.php"> Click here to sign up</a></p>
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
          <li><a href="../search.php?gender=men">MEN</a></li>
          <li><a href="../search.php?gender=women">WOMEN</a></li>
          <li><a href="../search.php?gender=kids">KIDS</a></li>
        </ul>
        </div>
      </div>

    </div>
    <hr><span class="copyright">© IT.37 BenBoots Shop</span> 
  </footer>
</body>
</html>