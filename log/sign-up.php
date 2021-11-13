<?php

session_start();
require_once('./../global.php');
require_once('./../functions.php');

// Register
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $pass = $_POST['mat_khau'];
    $pass2 = $_POST['mat_khau2'];
    $name = $_POST['ten'];
    $phone = $_POST['sdt'];
    $date = date('d M Y');
    
    $user = getSelect_id('khach_hang', 'email', $email);
    echo $user;
    // if(!empty($email) && !empty($pass) && !empty($pass2) && !empty($name) && !empty($phone)) {
        // if($user > 0) {
        //     echo "<script>alert('Email này đã tồn tại. Bạn vui lòng nhập email khác.');window.location='sign-up-form.php'</script>";
        // }
        // elseif($pass2 != $pass) {
        //     echo "<script>alert('Mật khẩu xác nhận không khớp với mật khẩu.');window.location='sign-up-form.php'</script>";
        // }
        // else {
        //     $user = insert_user($name, md5($pass), $email, $phone, $date);
        //     if($user) {
        //         echo "<script>alert('Đăng ký thành công.');window.location='login-form.php'</script>";
        //     }
        // }
    // }
    // else {
    //     echo "<script>alert('Bạn vui lòng nhập đầy đủ thông tin.');window.location='sign-up-form.php'</script>";
        
    // }
}
?>