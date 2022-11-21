<?php 
  session_start(); 


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
      echo '<title>' . $_GET['name'] .'</title>';
    ?>
    <script src="detail.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                 echo '<a class="nav-link" href="user.php" >' . $_SESSION['name'] . '</a>';
               }
              else{
                echo '<a class="nav-link" href="Login/login.php" >LOGIN</a>';
              }
            ?>
          </li>
        </ul>
  </nav>
  <?php
        $file = file_get_contents( $_GET['gender'] . '.json');
        $data = json_decode( $file );
        for( $i=0; $i<count( $data ); $i++ ) {
          $brand = $data[$i]->brand;
          $shoes = $data[$i]->shoes;

          for( $j=0; $j<count($shoes); $j++ ){
            $shoeName = $shoes[$j]->name;
            if ( $shoeName == $_GET['name'] ){
              $shoePrice = $shoes[$j]->price;
              $j = 999;
              $i = 999;
            }
          }
        }
  ?>
              
  <div class="container-fluid usable">
  <div class="container-fluid">
    <div class="row">
      <div class="proimage col-lg-5">
        <div class="product">
  
        <?php
          echo "<img src='picture/" . $_GET['gender'] . '/' . $_GET['name'] . ".jpg' alt=''>";
        ?>
        </div>

        <hr style="height:5px;border-width:0;color:white;">

        <div class="size-chart" > 
          <table class="chart">
        <tbody>
            <tr>
                <th>MEN UK</th>
                <th>WOMEN UK</th>
                <th>US</th>
                <th>EU</th>
                <th>CM</th>
            </tr>
            <tr>
                <td>4</td>
                <td>5</td>
                <td>3.5</td>
                <td>36</td>
                <td>22.1</td>
            </tr>
            <tr>
                <td>4.5</td>
                <td>5.5</td>
                <td>4</td>
                <td>36.7</td>
                <td>22.5</td>
            </tr>
            <tr>
                <td>5</td>
                <td>6</td>
                <td>4.5</td>
                <td>37.3</td>
                <td>22.9</td>
            </tr>
            <tr>
                <td>5.5</td>
                <td>6.5</td>
                <td>5</td>
                <td>38</td>
                <td>23.3</td>
            </tr>
            <tr>
                <td>6</td>
                <td>7</td>
                <td>5.5</td>
                <td>38.7</td>
                <td>23.8</td>
            </tr>
            <tr>
                <td>6.5</td>
                <td>7.5</td>
                <td>6</td>
                <td>39.3</td>
                <td>24.2</td>
            </tr>
            <tr>
                <td>7</td>
                <td>8</td>
                <td>6.5</td>
                <td>40</td>
                <td>24.6</td>
            </tr>
            <tr>
                <td>7.5</td>
                <td>8.5</td>
                <td>7</td>
                <td>40.7</td>
                <td>25</td>
            </tr>
            <tr>
                <td>8</td>
                <td>9</td>
                <td>7.5</td>
                <td>41.3</td>
                <td>25.5</td>
            </tr>
            <tr>
                <td>8.5</td>
                <td>9.5</td>
                <td>8</td>
                <td>42</td>
                <td>25.9</td>
            </tr>
            <tr>
                <td>9</td>
                <td>10</td>
                <td>8.5</td>
                <td>42.7</td>
                <td>26.3</td>
            </tr>
            <tr>
                <td>9.5</td>
                <td>10.5</td>
                <td>9</td>
                <td>43.3</td>
                <td>26.7</td>
            </tr>
            <tr>
                <td>10</td>
                <td>11</td>
                <td>9.5</td>
                <td>44</td>
                <td>27.1</td>
            </tr>
            <tr>
                <td>10.5</td>
                <td>11.5</td>
                <td>10</td>
                <td>44.7</td>
                <td>27.6</td>
            </tr>
            <tr>
                <td>11</td>
                <td>12</td>
                <td>10.5</td>
                <td>45.3</td>
                <td>28</td>
            </tr>
            <tr>
                <td>11.5</td>
                <td>12.5</td>
                <td>11</td>
                <td>46</td>
                <td>28.4</td>
            </tr>
            <tr>
                <td>12</td>
                <td>13</td>
                <td>11.5</td>
                <td>46.7</td>
                <td>28.8</td>
            </tr>
            <tr>
                <td>12.5</td>
                <td>13.5</td>
                <td>12</td>
                <td>47.3</td>
                <td>29.3</td>
            </tr>
            <tr>
                <td>13</td>
                <td>14</td>
                <td>12.5</td>
                <td>48</td>
                <td>29.7</td>
            </tr>
            <tr>
                <td>13.5</td>
                <td>14.5</td>
                <td>13</td>
                <td>48.7</td>
                <td>30.1</td>
            </tr>
            <tr>
                <td>14</td>
                <td>15</td>
                <td>13.5</td>
                <td>49.3</td>
                <td>30.5</td>
            </tr>
            <tr>
                <td>15</td>
                <td>16</td>
                <td>14.5</td>
                <td>50.7</td>
                <td>31.4</td>
            </tr>
        </tbody>
    </table>
        </div>
      </div>
      
      <div class="prodetail pb-5 col-lg-7">
        <div class="wish">
          <?php
            echo "<a href='detail.php?gender=". $_GET['gender'] ."&name=" . $shoeName . "&wish=true'>";
            $user_wish = $db->querySingle("SELECT wishlist FROM user WHERE username ='".$_SESSION['name']."'");
            $has = 0;
            $wish = trim($user_wish, ',');
            $wish = explode(',', $wish);
            foreach ($wish as $wish) {
               $wish = explode(':', $wish);
               if ($wish[0] == $_GET['name']){
                 $has = 1;
               }
            }
            if(isset($_GET['wish'])){
              if($_GET['wish']==true&&$has==0){
                $user_wish_add = $db->querySingle("UPDATE user SET wishlist = '"
                . $user_wish .
                 $shoeName .
                ":".$_GET['gender']."/".$_GET['name'].".jpg".
                ":".$_GET['gender'].
                ",".
                "'
                WHERE username ='".$_SESSION['name']."'");
                echo'<button class="btn btn-dark add">Remove from wishlist</button>';
              }
              else if($_GET['wish']==true&&$has==1){
                $user_wish = $db->querySingle("SELECT wishlist FROM user WHERE username ='".$_SESSION['name']."'");
                $total_wish = '';
                $wish = trim($user_wish, ',');
                $wish = explode(',', $wish);
                foreach ($wish as $wish) {
                  $wish = explode(':', $wish);
                  if ($wish[0] == $_GET['name']){
                      
                  }
                  else{
                    $total_wish = $total_wish.$wish[0].":".$wish[1].":".$wish[2].",";
                    $user_wish_add = $db->querySingle("UPDATE user SET wishlist = '". $total_wish."' WHERE username ='".$_SESSION['name']."'");
                  }
                }
                echo'<button class="btn btn-dark add">Add to wishlist</button>';
              }
              // else if($_GET['wish']!=true&&$has==1){
              //   echo'<button class="btn btn-dark add">Remove from wishlist</button>';
              // }
              // else if($_GET['wish']!=true&&$has==0){
              //   echo'<button class="btn btn-dark add">Add to wishlist</button>';
              // }
            }
            else{
              echo'<button class="btn btn-dark add">Add to wishlist</button>';
            }
          echo'</a>';
              
         ?>
        </div>
        
        <?php
                echo "<h1>" . $shoeName . "</h1>";
                echo "<h2>" . $brand . "</h2><br>";
        ?>
        
          <h3>SIZE<h3>
            <?php
         if(isset($_SESSION['name'])){
        echo'<form action="detail.php?gender='.$_GET['gender'].'&name='.$_GET['name'] . '&add=true" method="post">';
         }
         else{
           echo'<form action="Login/login.php" method="POST">';
         }
        ?>
        <select name="size" id="size">
          <option> 3.5 US / 36 EU </option>
          <option> 4 US   / 36.47 EU </option>
          <option> 4.5 US / 37.3 EU </option>
          <option> 5 US   / 38 EU </option>
          <option> 5.5 US / 38.7 EU </option>
          <option> 6 US   / 39.3 EU </option>
          <option> 6.5 US / 40 EU </option>
          <option> 7 US   / 40.7 EU </option>
          <option> 7.5 US / 41.3 EU </option>
          <option> 8 US   / 42 EU </option>
          <option> 8.5 US / 42.7 EU </option>
          <option> 9 US   / 43.3 EU </option>
          <option> 10 US  / 44.7 EU </option>
          <option> 10.5 US  / 45.3 EU </option>
          <option> 11 US    / 46 EU </option>
          <option> 11.5 US  / 46.7 EU </option>
          <option> 12 US    / 47.3 EU </option>
          <option> 12.5 US  / 48 EU </option>
          <option> 13 US    / 48.7 EU </option>
          <option> 13.5 US  / 49.3 EU </option>
          <option> 14.5 US  / 50.7 EU </option>
        </select>
            
        <br>
        <h3>NUMBER OF ITEM</h3>
        <input name="quantity" id="Quantity" class="mt-2" type="number" min="1" value="1">
  
        <br><br><br>
        <h3>PRICE</h3>
        <?php
     
          echo "<h3>". $shoePrice ."฿</h3>";
        ?>
        <div class="add">
          <?php
            $uname = $_SESSION['name'];
              if(isset($_SESSION['name'])){
                echo "<button type='submit' class='btn btn-dark add'>Add to CART</button>";
                  if(isset($_GET['add'])){
                    $user_cart = $db->querySingle("SELECT cart FROM user WHERE username ='$uname'");
                    $user_cart_add = $db->querySingle("UPDATE user SET cart = '"
                    . $user_cart .
                    $shoeName .
                    ":".$_POST['size'].
                    ":".$_POST['quantity'].  
                    ":".$_GET['gender']."/".$_GET['name'].".jpg".
                    ":".$shoePrice.
                    ":".$_GET['gender'].
                    ":".uniqid().
                    ",".
                    "'
                    WHERE username ='$uname'");
                    }
                  }
          else{
            echo'<a href="Login/login.php" class="add"><button class="btn btn-dark">Add to CART</button></a>';
          }
          
          // Close database
          $db->close();
         
          ?>
        </form>
        </div>
             <?php  if(isset($_GET['add'])) { ?>
                  <br>
                  <div class="alert alert-success " role="alert">
                     Added to cart
                  </div>
        <?php } ?>     
      </div>
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