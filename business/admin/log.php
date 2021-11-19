<?php
function admin_login(){
    if(isset($_SESSION['admin'])){
        header("Location: " . BASE_URL . "/admin");
        die;
    }
    include_once "./views/admin/login.php";
}

function admin_save_login(){
    extract($_REQUEST);
if (
    checkEmpty($email) == false ||
    checkEmpty($mat_khau) == false
    ) {
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: " . BASE_URL . "/admin/login");
        die;
    }

$admin = getSelect_one('admin', 'email', $email);
if(empty($admin) || $admin['mat_khau'] != md5($mat_khau)){
    $_SESSION['error'] = "Thông tin email hoặc mật khẩu không chính xác !";
    header("Location: " . BASE_URL . "/admin/login");
    die;
}
$_SESSION['admin'] = $admin;

header("Location: " . BASE_URL . "/admin");
}

function admin_logout(){
    if(!isset($_SESSION['admin'])){
        header("Location: " . BASE_URL . "/admin/login");
        die;
    }
    unset($_SESSION['admin']);
    header("Location: " . BASE_URL . "/admin/login");
}
?>