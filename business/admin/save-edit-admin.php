<?php
function admin_edit_info() {
    $user = $_SESSION['user'];
    admin_render('edit-user.php', ['user' => $user]);
}

function admin_save_edit_info() {
    $id = $_SESSION['user']['id'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    if (checkSdt($sdt) == false){
        $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
        header("Location: " . BASE_URL  . "/client/edit-info");
        die;
    }
    edit_user($ten, $sdt, $id);
    header('location: ' . BASE_URL . '/client/edit-info');
}

?>