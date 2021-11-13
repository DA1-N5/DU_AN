<?php
session_start();
require_once('./../global.php');
require_once('./../functions.php');

/* Login Form */
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['mat_khau'];
    $user = getSelect_one('khach_hang', 'email', $email);
    if (md5($password) == $user['mat_khau']) {
        $extra = "index.php";
        $_SESSION['user'] = $user;
        $host=$_SERVER['HTTP_HOST'];
        header("location: http://localhost:8080/git/DU_AN/");
        exit();
    }
    else {
    echo "<script>alert('Mật khẩu không đúng.');</script>";
    $extra="index.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location: http://localhost:8080/git/DU_AN/");
    exit();
    }
}
?>