<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
      body{
         font-family: 'Kanit', sans-serif;
      }
    </style>
</head>
<body>

<?php
  // Connect to Database 
  class MyDB extends SQLite3 {
   function __construct() {
      $this->open('user.db');
   }
}

// Open Database 
$db = new MyDB();
if(!$db) {
   echo $db->lastErrorMsg();
}

// Query process 
$sql =<<<EOF
CREATE TABLE user
(username TEXT PRIMARY KEY     NOT NULL,
password           TEXT    NOT NULL,
email     TEXT    NOT NULL,
address        TEXT    NOT NULL,
cart TEXT,
wishlist TEXT,
history TEXT);
EOF;

$ret = $db->exec($sql);
if(!$ret){
echo $db->lastErrorMsg();
} else {
echo "Table created successfully<br>";
}

// Close database
$db->close();
?>
   
</body>
</html>