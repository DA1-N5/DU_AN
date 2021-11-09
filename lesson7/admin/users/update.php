<?php
session_start();
require_once('./../../db/khach_hang.php');

$value = [
    'id' => $_POST['id'],
    'ma' => $_POST['ma'],
    'ten' => $_POST['ten'],
    'email' => $_POST['email'],
    'sdt' => $_POST['sdt'],
    'dia_chi' => $_POST['address'],
    'gioi_tinh' => $_POST['gender'],
];
function checkform(array $data){
    if (
        empty($data['ma']) ||
        empty($data['ten']) ||
        empty($data['email']) ||
        empty($data['sdt']) ||
        empty($data['dia_chi']) ||
        empty($data['gioi_tinh'])
    ) {
        return false;
    }
    if (
        !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
    ) {
        return false;
    }
    // if (
    //     !is_int($data['sdt'])
    // ) {
    //     return false;
    // }
    return true;
}

var_dump(checkform($value));die;

if (checkform($value) == true) {
    update($value);
    header("Location: http://localhost/WE16305/lesson7/admin/users/index.php");
    die;
} else {
    $error = "Lỗi !";
    $_SESSION['error'] = $error;
    header("Location: http://localhost/WE16305/lesson7/admin/users/edit.php");
    die;
}
?>