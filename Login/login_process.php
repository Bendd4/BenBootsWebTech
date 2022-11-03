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
    
    

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

      
        if (empty($username)) {
            $_SESSION['error'] = 'Please enter Username';
            header("location: login.php");
        } 
        else if (empty($password)) {
            $_SESSION['error'] = 'Please enter Password';
            header("location: login.php");
        // } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        //     $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        //     header("location: login.php");
        // } else {
           
        }
        else{
            $sql ="SELECT * from user ";
            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            
               if($username==$row['username']&&$password==$row['password']){
                header("location: ../index.php");
                $_SESSION['name'] = $username;
                exit();
               }
               else if($username==$row['username']&&$password!=$row['password']){
                $_SESSION['error'] = "Wrong Password";
                header("location: login.php");
                exit();
               }
               else if($username!=$row['username']){
                $_SESSION['error'] = "Invalid Username";
                header("location: login.php");
              
               
            }

            }
         
        }

    }


?>