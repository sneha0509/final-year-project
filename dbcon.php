<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname='demodb';

try {
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //echo "Connected successfully";
  //header("Location:../HTML/index.html");

} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
