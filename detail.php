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
    <title>Main Page</title>
    <script src="detail.js"></script>
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
                 echo '<a class="nav-link" href="../user.php" >' . $_SESSION['name'] . '</a>';
               }
              else{
                echo '<a class="nav-link" href="../Login/login.php" >LOGIN</a>';
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
  <div class="detail">
    <div class="proimage">
      <div class="product">

      <?php
        echo '<img src="../picture/' . $_GET['gender'] . '/' . $_GET['name'] . '.jpg" alt="">';
      ?>
      </div><br><br>
      <hr style="height:6px;border-width:0;color:white;">
      <div class="size">
        <img src="https://static-ssp.supersports.co.th/media/catalog/product/s/s/SSP61716445_5.jpg?impolicy=resize&width=440" alt="">
      </div>
    </div>
    
    <div class="prodetail pb-5">
      <div class="wish">
        <button class="btn btn-dark">ADD TO WISHLIST</button>
      </div>
      
      <?php
              echo "<h1>" . $shoeName . "</h1>";
              echo "<h2>" . $brand . "</h2><br>";
      ?>
      
        <h3>SIZE<h3>
      <select id="Size">
        <option>Select Size</option>
        <option> 6 US / 5.5 UK / 39 EU </option>
        <option> M </option>
        <option> L </option>
        <option> XL </option>
      </select>


      <br>
      <h3>NUMBER OF ITEM</h3>
      <input id="Quantity" class="mt-2" type="number" value="1">

      <br><br><br>
      <h3>PRICE</h3>
      <?php
        echo "<h3>". $shoePrice ."฿</h3>";
      ?>
      <div class="add">
        <?php
          $uname = $_SESSION['name'];
 
           echo "<a href='detail.php?gender=". $_GET['gender'] ."&name=" . $_GET['name'] . 
             "&add=true' ><button class='btn btn-primary'>addtocart</button></a>";
          if($_GET['add']==true){

 $ $db->querySingle("SELECT cart FROM user WHERE username ='$uname'");
            
            //   $sql ="SELECT cart from user WHERE username = '$uname' ";
            //   $ret = $db->exec($sql);
            // echo$ret;
            //     $add = "UPDATE user SET cart = '" . $shoeName . $ret ."' WHERE username = '$uname';";
            //   $ret = $db->exec($add);
              
            var_dump($db->querySingle("SELECT cart FROM user WHERE username ='$uname'"));
              // while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
              //  echo$row['email'];
              //   echo$row['address'];
              //     echo"<p class='text-dark'>".$row['cart']."</p>";
              //      $add = "UPDATE user SET cart = '" . $shoeName . $row['cart'] ."' WHERE username = '$uname';";
              // $ret = $db->exec($add);
              
              // }
            
          }

          // Close database
          $db->close();
        ?>
      </div>
     
  
    
   
    </div>
  
</body>

</html>