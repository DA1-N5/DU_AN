<?php
session_start();
require_once('./../../global.php');
if(!isset($_SESSION['admin'])){
    header("Location: $website/admin/log/login.php");
    die;
}
unset($_SESSION['admin']);
header("Location: $website/admin/log/login.php");
?>