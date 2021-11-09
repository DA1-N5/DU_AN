<?php
    $id= $_GET['id'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=Day10;charset=utf8","root");
    $query = "delete from users where id=$id";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    
    header('location:list-user.php');

?>