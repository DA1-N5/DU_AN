<?php

session_start();
require_once './../../db/khach_hang.php';
$data = [
    'ma' => $_POST['ma'],
    'ten' => $_POST['ten'],
    'email' => $_POST['email'],
    'sdt' => $_POST['sdt'],
    'dia_chi' => $_POST['address'],
    'gioi_tinh' => $_POST['gender'],
    'avatar' => ''
];

$upLoad = $_FILES['avatar'];

if(strpos($upLoad['type'], 'image') === false){

    $_SESSION['error'] = "Avatar phải là ảnh";
    header("Location: http://localhost/WE16305/lesson7/admin/users/form-create.php");
    die;
}

if($upLoad['size'] > 3000000){
    $_SESSION['error'] = "Avatar phải nhỏ hơn 3MB";
    header("Location: http://localhost/WE16305/lesson7/admin/users/form-create.php");
    die;
}
$storePath = './../images/';
$filename = $upLoad['name'];
$path = $storePath . $filename;
move_uploaded_file($upLoad['tmp_name'], $path);
$data['avatar'] = '/WE16305/lesson7/admin/images/' . $filename;

if(
    empty( $data['ma']) == true ||
    empty( $data['ten']) == true ||
    empty( $data['email']) == true ||
    empty( $data['sdt']) == true ||
    empty( $data['dia_chi']) == true ||
    empty( $data['gioi_tinh']) == true
) {
    $error = "Không được để trống";

    $_SESSION['error'] = $error;
    header("Location: http://localhost/WE16305/lesson7/admin/users/form-create.php");
    die;
}

insert($data);

header("Location: http://localhost/WE16305/lesson7/admin/users/index.php");
?>