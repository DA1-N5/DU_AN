<?php
$website = "/DA1";
$url_admin = $website . "/admin/";
$url_images = $website . "/images/";
$url_main = $website . "/index.php";

$image_path = $_SERVER['DOCUMENT_ROOT'] . $url_images;

function save_file($name, $address){
    $image = $_FILES[$name];
    $fileName = $image['name'];
    $part = $address . $fileName;
    move_uploaded_file($image['tmp_name'], $part);
}

?>