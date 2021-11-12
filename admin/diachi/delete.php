<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
getDelete('dia_chi', 'id', $id);
header("Location: $website/admin/diachi/list.php");
?>