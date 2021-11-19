<?php

function client_login_form() {
    include_once './views/client/login.php';
}

function client_login() {
    extract($_REQUEST);
    if(empty($email) || empty($mat_khau)) {
        $_SESSION['error'] = 'Không được để trống.';
        header("location: " . BASE_URL . "/login");
        die;
    }
    $user = getSelect_one('khach_hang', 'email', $email);
    
    if (empty($user) || md5($mat_khau) != $user['mat_khau']) {
        $_SESSION['error'] = 'Mật khẩu hoặc tài khoản không đúng.';
        header("location: " . BASE_URL . "/login");
        die;
    }
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "<script>alert('Đăng nhập thành công.');</script>";
    if(isset($_SESSION['id_tour'])){
        $id_tour = $_SESSION['id_tour'];
        unset($_SESSION['id_tour']);
        header("location: " . BASE_URL . "/detail?id=$id_tour");
        die;
    }
    header("Location: " . BASE_URL . "/");
}

function client_log_out() {
    if(!isset($_SESSION['user'])){
        header("Location:".BASE_URL."/");
        die;
    }
    unset($_SESSION['user']);
    $_SESSION['success'] = "<script>alert('Bạn đã đăng xuất.');</script>";
    header("Location:".BASE_URL."/");
}

function client_sign_up_form() {
    include_once './views/client/sign_up.php';
}

function client_sign_up() {
    extract($_REQUEST);
    $_SESSION['info'] = $_REQUEST;
    // Register
    $user = getSelect_one('khach_hang', 'email', $email);
    if(empty($email) || empty($mat_khau) || empty($mat_khau2) || empty($ten) || empty($sdt)) {
        $_SESSION['error'] = 'Mời bạn nhập đầy đủ thông tin.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if(!empty($user)) {
        $_SESSION['error'] = 'Mail bạn vừa nhập đã tồn tại.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if(strlen($mat_khau) < 6) {
        $_SESSION['error'] = 'Mật khẩu phải ít nhất 6 ký tự.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if($mat_khau2 != $mat_khau) {
        $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    if(!checkSdt($sdt)) {
        $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
        header("location:" . BASE_URL . "/sign-up");
        die;
    }
    else {
        $chu_de = "Confirm Email";
        $code = random_int(0,999999);
        $noi_dung = "Xin chào $ten đã đến với Webside du lịch VNTravel của chúng tôi, mã xác nhận là <p style='color:blue;'>$code</p> mời bạn hãy nhập mã xác nhận ! Xin cảm ơn !";
        $_SESSION['checkMail']['noi_dung'] = $noi_dung;
        $_SESSION['checkMail']['chu_de'] = $chu_de;
        $_SESSION['checkMail']['ten'] = $ten;
        $_SESSION['checkMail']['email'] = $email;
        $_SESSION['code'] = $code;
        header("Location:" . BASE_URL . "/send-mail?id=1");
    }
}

function client_check_code_form() {
    include_once './views/client/check_code.php';
}

function client_check_code() {
    extract($_REQUEST);

    if(isset($_SESSION['code'])) {
        if(intval($_SESSION['code']) != intval($code)) {
            $_SESSION['error'] = 'Mã code sai';
            header("Location: $website/log/formCheckCode.php");
            die;
        }
    }

    if(isset($_SESSION['info'])) {
        extract($_SESSION['info']);
        $date = date('d m Y');
            $new_user = insert_user($ten, md5($mat_khau), $email, $sdt, $date);
            if(empty($new_user)) {
                $_SESSION['success'] = "<script>alert('Đăng ký thành công');</script>";
                header("location: " . BASE_URL . "/login");
                die;
            }
        unset($_SESSION['info']);
        die;
    }
}

function client_sendmail() {
    require_once './sendmail/send.php';
}
