<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
getDelete('khach_hang', 'id', $id);
header("Location: $website/admin/users/list.php");
?>