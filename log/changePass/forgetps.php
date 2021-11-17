<?php

session_start();
require_once "./../../functions.php";
require_once "./../../validate.php";

extract($_REQUEST);
$_SESSION['info'] = $_REQUEST;

if(!checkEmpty($email)) {
    $_SESSION['error'] = 'Bạn chưa nhập Email.';
    header("location: /DU_AN/log/changePass/forgetps-form.php");
    die;
}

if(!checkEmail($email)) {
    $_SESSION['error'] = 'Email bạn nhập không đúng định dạng.';
    header("location: /DU_AN/log/changePass/forgetps-form.php");
    die;
}

$user = getSelect_one('khach_hang', 'email', $email);

if(!checkEmpty($user)) {
    $_SESSION['error'] = 'Email của bạn không tồn tại.';
    header("location: /DU_AN/log/changePass/forgetps-form.php");
    die;
}

else {
    $chu_de = "Thay đổi mật khẩu";
    $code = random_int(100000,999999);
    $noi_dung = "<h3>Xin chào " . $user['ten'] . ", mã xác nhận là <h2 style='color:blue;'>$code</h2> mời bạn hãy nhập mã xác nhận để thay đổi mật khẩu ! Xin cảm ơn !</h3>";
    $_SESSION['checkMail']['noi_dung'] = $noi_dung;
    $_SESSION['checkMail']['chu_de'] = $chu_de;
    $_SESSION['checkMail']['ten'] = $user['ten'];
    $_SESSION['checkMail']['email'] = $email;
    $_SESSION['code'] = $code;
    $_SESSION['id'] = $id;
    header('Location: /DU_AN/sendmail/send2.php?id=1');
}

?>