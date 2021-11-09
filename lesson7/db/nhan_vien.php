<?php
require_once "ket_noi.php";

function login($email, $password) {
    $conn = getConnection();

    $sql = "select * from nhan_vien where email = :email and password = :password";
    $data =[
        'email' => $email,
        'password' => $password,
    ];

    $statement = $conn->prepare($sql);
    $statement->execute($data);
    $row = $statement->fetch();

    
    if ($row == false) {
        return [];
    }

    $nv = [
        'id' => $row['id'],
        'email' => $row['email'],
        'password' => $row['password'],
        'ten' => $row['ten'],
    ];
    return $nv;
}
?>