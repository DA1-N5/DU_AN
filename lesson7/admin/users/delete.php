<?php
require_once './../../db/khach_hang.php';
$id = intval($_GET['id']);
deleteById($id);
header("Location: http://localhost/WE16305/lesson7/admin/users/index.php");
?>