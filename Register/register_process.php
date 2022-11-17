<?php


    session_start();
     // Connect to Database 
   class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../user_db/user.db');
    }
 }

 // Open Database 
 $db = new MyDB();


 // Query process 
 
 $sql ="SELECT * from user";

 $ret = $db->query($sql);
 
   
      if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $address = $_POST['address'];


        if (empty($username)) {
            $_SESSION['error'] = 'Please enter a Username';
            header("location: register.php");
        } 
       
        else if (empty($password)) {
            $_SESSION['error'] = 'Please enter a Password';
            header("location: register.php");
        }  
        else if (empty($cpassword)) {
            $_SESSION['error'] = 'Please confirm the Password';
            header("location: register.php");
        } 
        else if ($password != $cpassword) {
            $_SESSION['error'] = 'Password did not match';
            header("location: register.php");
        }
        else if (empty($email)) {
            $_SESSION['error'] = 'Please enter an Email';
            header("location: register.php");
        } 
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid Email';
            header("location: register.php");
        } 
        else{
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                if($row['username']==$username){
                    $_SESSION['error'] = 'This Username is already in use';
                    header("location: register.php"); 
                    exit();
                }

            }
            $Insert =<<<EOF
            INSERT INTO user (username, password, email, address) 
            VALUES ('$username','$password', '$email', '$address');
            EOF;
            $reg = $db->exec($Insert);
            header("location: ../Login/login.php");
        }






      }

      $db->close();


?>
