<?php
 session_start();
 if(isset($_SESSION['name'])){
   echo "".$_SESSION['name'];
 }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <link href="index.css" rel="stylesheet">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body class="dark">
<!-- Nav Bar (TOP) -->
  <nav class="navbar navbar-expand-lg navbar-dark dark">
    <div class="container-fluid">
        <ul class="navbar-nav float-left">
          <li class="nav-item">
            <a class="nav-link" href="#">MAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">WOMEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >KIDS</a>
          </li>
        </ul>
        <a class="navbar-brand" href="index.php">BENBOOTS SHOP</a>
        <ul class="navbar-nav float-right"> 
          <li class="nav-item">
            <a class="nav-link" href="#">CART</a>
          </li>
          <li class="nav-item">
            <?php
              if (true){
                echo '<a class="nav-link" href="../Login/login.php" >LOGIN</a>';
              }
              else{
                echo '<a class="nav-link" href="../Login/login.php" >NOT LOGIN (Insert username button here?)</a>';
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
  
</body>
</html>
