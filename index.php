<?php
session_start();
require_once './commons/global.php';
require_once './commons/helper.php';
require_once './commons/validate.php';
require_once './dao/functions.php';
require_once './dao/connect_DB.php';

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        require_once './business/client/clientpage.php';
        client_homepage();
        break;
    case 'detail':
        require_once './business/client/clientpage.php';
        client_detail();
        break;
    case 'admin':
        require_once './business/admin/dashbroard.php';
        admin_dashbroard();
        break;
    case 'admin/login':
        require_once './business/admin/log.php';
        admin_login();
        break;
    case 'admin/save-login':
        require_once './business/admin/log.php';
        admin_save_login();
        break;
    case 'admin/logout':
        require_once './business/admin/log.php';
        admin_logout();
        break;
    default:
        echo "Đường dẫn bạn đang truy cập chưa được định nghĩa";
        break;
}
?>