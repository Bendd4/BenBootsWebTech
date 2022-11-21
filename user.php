<?php session_start(); 

class MyDB extends SQLite3 {
        function __construct() {
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
    <?php
    echo '<title>User: ' . $_SESSION['name'] .'</title>';
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="user.css" rel="stylesheet">
    
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
                  if($_GET['save']==1){
                  echo '<a class="nav-link" href="../user.php" >'. $_POST['username'] .'</a>';
               }
                  else{
                 echo '<a class="nav-link" href="../user.php" >'. $_SESSION['name'] .'</a>';
                  }
               }
              else{
                echo '<a class="nav-link" href="../Login/login.php" >LOGIN</a>';
              }

            ?>
          </li>
        </ul>
  </nav>

  <div class="container usable long p-5">
    <div class="row ">
      <div class="container col-lg-8 bg-light p-5">
        <div class="row">
    <?php
   
      if($_GET['save']==1){
         $user_username_update =  $db->querySingle("UPDATE user set username ='".$_POST['username']."' WHERE username ='".$_SESSION['name']."'");
           // $user_cart_del = $db->querySingle("UPDATE user SET cart = '' WHERE username     ='$uname'");
    $_SESSION['name'] = $_POST['username'];
        
          $user_Address_update =  $db->querySingle("UPDATE user set address ='".$_POST['address']."' WHERE username ='".$_SESSION['name']."'");
        
      
           $user_address =  $db->querySingle("SELECT address FROM user WHERE username ='".$_SESSION['name']."'");
         
        // echo$_POST['username'].$_POST['address'];
      }
      if($_GET['edit']!=1){
           $user_address =  $db->querySingle("SELECT address FROM user WHERE username ='".$_SESSION['name']."'");
         echo '<h2 class="text-dark p-2 "> USERNAME : ' . $_SESSION['name'] . '</h2>';
         echo '<h2 class="text-dark p-2"> ADDRESS : ' . $user_address . '</h2>';
         echo '<a href="user.php?edit=1"  id="edit">';
         echo '<input type="Button" value="Edit" class="btn btn-dark m-1">';
         echo '</a>'; 
         
      }
      elseif($_GET['edit']==1){
          echo'<form action="user.php?save=1" method="POST" >';
          echo '<h2 class="text-dark p-2 col-sm-12 d-flex flex-row"> USERNAME : ';
         echo'<input type="text" class="form-control w-50 col-sm-6 ms-2" name="username" placeholder="USERNAME">';
         echo'</h2>';
         echo '<h2 class="text-dark p-2 col-sm-12 d-flex flex-row"> ADDRESS :';
     echo'<input type="text" class="form-control w-50 col-sm-6 ms-2" name="address" placeholder="ADDRESS">';
         echo'</h2>';
         echo'<button type="submit" class="btn btn-success  top-0 end-50">';
         echo'Save</button>';
         echo'</form>';
          echo'<a href="user.php" id="edit"><button type="submit" class="btn btn-danger  top-0 end-50">';
         echo'Cancel</button></a>';
      }
     
   
     
      echo '<form action="index.php" method="post">';
      echo '<a href="logout.php"><input type="Button" value="Logout" class="btn btn-dark m-1"></a>';
      echo '</form>';
    ?>
        </div>
      </div>
      <div class="col-lg-4">
        <h1> Wishlist </h1>
        <?php
          $user_wish = $db->querySingle("SELECT wishlist FROM user WHERE username ='".$_SESSION['name']."'");
           if($user_wish!=''){
          $wish = trim($user_wish, ',');
          $wish = explode(',', $wish);
             foreach ($wish as $wish) {
            $wish = explode(':', $wish);
               echo "<a href='detail.php?gender=". $wish[2] ."&name=" . $wish[0] . "'>";
               echo '<h5>'.$wish[0]."</h5><br>";
               echo '</a>';
             }
          }
        ?>
      </div>
      <div class="col-lg-8 bg-light p-3">
        <h2> Purchase History </h2>
        <?php
         $user_history = $db->querySingle("SELECT histor FROM user WHERE username ='".$_SESSION['name']."'");
        // echo $user_history;
        if($user_history!=''){
          $text = trim($user_history, ',');
          $text = explode(',', $text);
          foreach ($text as $text) {
            $text = explode(':', $text);
            // echo "<a href='detail.php?gender=". $text[5] ."&name=" . $text[0] . "'>";
            // echo '<div class="container p-5 bg-light  text-dark h-10" id="'.$i.'"> ';
            //   echo '<div class="row">';
            //   echo '<div class="col-md-6">';
            //   echo '<img class="col-md-4" style="width:150px;height:150px" src="../picture/'.$text[3].'">';
            //   echo '</div>';
            //   echo '<div class="col-md-6">';
            //   echo '<p>';
            //   echo $text[0]." X ".$text[2]."<br>";
            //   echo 'Size : '.$text[1]."<br>";
            //   echo 'Price : '.$text[4]."<br>";
            //   echo 'Total : '.$text[4]*$text[2]."<br>";
            //   $total_price += $text[4]*$text[2];
            //   echo '</p>';
            //   echo '</div>';
            //   echo '</div>';
            //   echo '</div>';
            //   echo'</a>';

            echo '<div class="container bg-light p-2 text-dark h-10" id="'.$i.'"> ';
              echo '<div class="row">';
                echo '<div class="col-sm-6">';
                  echo '<h5>' . $text[0] . '</h5>';
                echo '</div>';
                echo '<div class="col-sm-4">';
                  echo '<h5>Size:' . $text[1] . '</h5>';
                echo '</div>';
                echo '<div class="col-sm-2">';
                  echo '<h5>x' . $text[2] . '</h5>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            
             // $user_cart_del = $db->querySingle("UPDATE user SET histor = '' WHERE username     ='".$_SESSION['name']."'");
            }
          }
        ?>
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