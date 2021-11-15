<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
$status = intval($_GET['st']);
if($status == 1){
    update_status('tour', 2, $id);
} else if($status == 2){
    update_status('tour', 1, $id);
}
header("Location: $website/admin/tour/list.php");
?>