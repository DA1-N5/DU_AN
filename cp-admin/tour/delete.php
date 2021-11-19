<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
$tour = getSelect_one('tour','id',$id);
unlink($image_path . $phuong_tien['anh']);
getDelete('tour', 'id', $id);
header("Location: $website/admin/tour/list.php");
?>