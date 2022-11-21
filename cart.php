<?php
session_start();
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('user_db/user.db');
    }
}

// Open Database 
$db = new MyDB();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <link href="index.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <script src="cart.js"></script>
    <style>
        .usable {
            color: white;
            margin-top: 7.5vh;
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
                    <a class="nav-link" href="../cart.php">CART</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo '<a class="nav-link" href="../user.php" >' . $_SESSION['name'] . '</a>';
                    } else {
                        echo '<a class="nav-link" href="../Login/login.php" >LOGIN</a>';
                    }
                    ?>
                </li>
            </ul>
    </nav>
    <div class="container-fluid usable">
    </div>
    <h1 class="text-white text-center p-3">SHOPPING CART</h1>
    <div class="container p-5 pt-1">
      
        <?php

        $uname = $_SESSION['name'];
         if($_GET['del']=='true'){
           $user_cart_del = $db->querySingle("UPDATE user SET cart = '' WHERE username     ='$uname'");
         }
         

        $user_cart = $db->querySingle("SELECT cart FROM user WHERE username ='$uname'");
        // echo $user_cart."<br>";
        $text = trim($user_cart, ',');
        $text = explode(',', $text);
        $total_txt = '';

        $total_price = 0;

        foreach ($text as $text) {
          $text = explode(':', $text);
          if(($_GET['item']) == $text[6]){
             $_GET['item'] = "1";
            }
          else if($_GET['buy'] == 'true') {
              $total_txt = '';
              $total_txt = $total_txt.$text[0].":".$text[1].":".$text[2].":".$text[3].":".$text[4].":".$text[5].":".$text[6].",";
               $user_history = $db->querySingle("select histor from user  WHERE username ='$uname'");
               // echo "เดิม :".$user_history."<br>";
               $user_history_purchase = $db->querySingle("UPDATE user SET histor = '". $user_history . $total_txt."' 
                WHERE username ='$uname'");
              // echo "ใหม่ :".$user_history.$total_txt."<br>";
              
               
          }
          else{
            $total_txt = $total_txt.$text[0].":".$text[1].":".$text[2].":".$text[3].":".$text[4].":".$text[5].":".$text[6].",";
            // echo $total_txt."<br>";
            // echo $text[0];
            // echo $text[1];
            // echo $text[2];
            // echo $text[3];
            echo '<div class="container p-5 bg-white mt-5 w-75" text-dark" id="'.$i.'"> ';
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<img class="col-md-4" style="width:150px;height:150px" src="../picture/'.$text[3].'">';
            echo '</div>';
            echo '<div class="col-md-4">';
            echo '<p>';
            echo $text[0]." X ".$text[2]."<br>";
            echo 'Size : '.$text[1]."<br>";
            echo 'Price : '.$text[4]."<br>";
            echo 'Total : '.$text[4]*$text[2]."<br>";
            $total_price += $text[4]*$text[2];
            echo '</p>';
            echo '</div>';
            echo '<div class="col-md-4">';
            echo '<a href="cart.php?dell=true&item='.$text[6].'">';
            echo '<button type="button" class="btn btn-sm btn-outline-danger">';
            echo 'Remove';
            echo '</button>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        }
        echo '<div class="butt_container container w-75">';
        echo '<h3> Total Price: ' . $total_price . '฿</h3>';
        echo "<a href='cart.php?del=true'><button class='btn'>Clear orders</button></a>";
        echo "<a href='cart.php?buy=true'><button class='btn'>Purchase</button></a>";
        echo '</div>';
        $user_cart_add = $db->querySingle("UPDATE user SET cart = '". $total_txt."' WHERE username ='$uname'");
        if($_GET['buy']=='true'){
           echo'<div class="alert alert-success mt-5" role="alert">Purchase complete</div>';
           $user_cart_del = $db->querySingle("UPDATE user SET cart = '' WHERE username     ='$uname'");
        }
       
        
        $db->close();
        ?>
  
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