<?php
$website = "/DU_AN";
$url_admin = $website . "/admin/";
$url_images = $website . "/images/";

$image_path = $_SERVER['DOCUMENT_ROOT'] . $url_images;

function save_file($image, $address){
    $fileName = $image['name'];
    $part = $address . $fileName;
    move_uploaded_file($image['tmp_name'], $part);
}

?>