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
//------------------------Log Out------------------------------
function admin_logout(){
    if(!isset($_SESSION['admin'])){
        header("Location: " . BASE_URL . "/admin/login");
        die;
    }
    unset($_SESSION['admin']);
    header("Location: " . BASE_URL . "/admin/login");
}
//----------------------------Check mail--------------------------------
function admin_check_email_form() {
    include_once './views/admin/forget-pass.php';
}
function admin_check_email(){
    $email = $_POST['email'];
    
    if(!checkEmpty($email)) {
        $_SESSION['error'] = 'Bạn chưa nhập Email.';
        header("location:" . BASE_URL . "/admin/forgot-password");
        die;
    }
    
    if(!checkEmail($email)) {
        $_SESSION['error'] = 'Email bạn nhập không đúng định dạng.';
        header("location:"  . BASE_URL ."/admin/forgot-password");
        die;
    }
    
    $user = getSelect_one('admin', 'email', $email);
    
    if(!checkEmpty($user)) {
        $_SESSION['error'] = 'Email của bạn không tồn tại.';
        header("location:" . BASE_URL ."/admin/forgot-password");
        die;
    }
    else {
        $chu_de = "Confirm Email";
        $code = random_int(100000,999999);
        $noi_dung = "<h3>Xin chào " . $user['ten'] . ", mã xác nhận là <h2 style='color:blue;'>$code</h2> mời bạn hãy nhập mã xác nhận để thay đổi mật khẩu ! Xin cảm ơn !</h3>";
        $_SESSION['checkMail']['noi_dung'] = $noi_dung;
        $_SESSION['checkMail']['chu_de'] = $chu_de;
        $_SESSION['checkMail']['ten'] = $user['ten'];
        $_SESSION['checkMail']['email'] = $user['email'];
        $_SESSION['code'] = $code;
        $_SESSION['id'] = $user['id'];
        header("Location:" . BASE_URL . "/admin/send-mail?id=3");

    }

  
}
    //check code
function admin_check_code_form() {
       include_once('./views/admin/check_code.php');
}
function admin_check_code() {
    $code = $_POST['code'];
    // var_dump($_SESSION['code']==$code);
    // die;
    if(isset($_SESSION['code'])) {
        if(intval($_SESSION['code']) != $code) {
            $_SESSION['error'] = 'Mã code sai';
            header("Location:" . BASE_URL ."/admin/check-code-form");
            die;
        } else {
            header('location: ' . BASE_URL . '/admin/change-password-form');
        }
    }
   
}
    
function admin_change_pass_form(){
    include_once('./views/admin/changePass-form.php');
}

function admin_change_pass() {
    $email = $_SESSION['checkMail']['email'];
    $mat_khau = $_POST['mat_khau'];
    $mat_khau2 = $_POST['mat_khau2'];
    if(strlen($mat_khau) < 6) {
        $_SESSION['error'] = 'Mật khẩu phải ít nhất 6 ký tự.';
        header("location:". BASE_URL . "/admin/change-password-form");
        die;
    }

    if($mat_khau2 != $mat_khau) {
        $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
        header("location:". BASE_URL . "/admin/change-password-form");
        die;
    }
    update_admin(md5($mat_khau), $email);
        $_SESSION['success'] = "<script>alert('Đổi mật khẩu thành công');</script>";
        header("location:" . BASE_URL . "/admin/login");
        die;
    
}
///-------------------send Mail--------------------
function admin_sendmail() {
    require_once './sendmail/send.php';
}

?>