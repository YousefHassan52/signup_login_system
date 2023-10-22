<?php 
$dsn = "mysql:host=localhost;dbname=php_course";
$dbusername="root";
$dbpassword="";

try {
    $pdo=new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed: ". $e->getMessage();
}

