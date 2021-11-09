<?php
session_start();
require_once('./../db/nhan_vien.php');
$email = $_POST['email'];
$password = $_POST['password'];

var_dump($email, $password); die;

$nv = login($email, $password);

if ( empty($nv)){
    $error = "Sai Email Hoặc Mật Khẩu";

    header('Location: http://localhost/WE16305/lesson7/auth/login_form.php');
    die;
}
$_SESSION['nhan_vien'] = $nv;
header('Location: http://localhost/WE16305/lesson7/admin/users/index.php');
?>