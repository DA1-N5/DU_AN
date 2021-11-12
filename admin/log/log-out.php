<?php
session_start();
require_once('./../../global.php');
unset($_SESSION['admin']);
header("Location: $website/admin/log/login.php");
?>