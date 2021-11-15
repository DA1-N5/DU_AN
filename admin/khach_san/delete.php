<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
getDelete('khach_san', 'id', $id);
header("Location: $website/admin/khach_san/list.php");
?>