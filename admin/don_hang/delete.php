<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
getDelete('don_hang', 'id', $id);
header("Location: $website/admin/don_hang/list.php");
?>