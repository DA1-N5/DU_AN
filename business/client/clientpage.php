<?php
function client_homepage(){
    $tour = getSelect("tour", 0, 10);
    client_render('homepage.php', ["result" => $tour]);
}
function client_detail(){
    $value = getSelect_one("tour", "id", intval($_GET['id']));
    $comment = [];
    client_render('detail.php', [
        "value" => $value,
        "comment" => $comment
    ]);
}

function client_login() {
    extract($_REQUEST);
    if(empty($email) || empty($mat_khau)) {
        $_SESSION['error'] = 'Không được để trống.';
        header("location: $website/log/loginform.php");
        die;
    }
    $user = getSelect_one('khach_hang', 'email', $email);
    
    if (empty($user) || md5($mat_khau) != $user['mat_khau']) {
        $_SESSION['error'] = 'Mật khẩu hoặc tài khoản không đúng.';
        header("location: $website/log/loginform.php");
        die;
    }
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "<script>alert('Đăng nhập thành công.');</script>";
    if(isset($_SESSION['id_tour'])){
        $id_tour = $_SESSION['id_tour'];
        unset($_SESSION['id_tour']);
        header("location: $website/tour-detail.php?id=$id_tour");
        die;
    }
    header("Location: $website/");
}
