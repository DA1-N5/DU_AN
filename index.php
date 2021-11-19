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
    case 'admin/vehicle/list':
        require_once './business/admin/vehicle.php';
        vehicle_list();
        break;
    case 'admin/vehicle/add':
        require_once './business/admin/vehicle.php';
        vehicle_add();
        break;
    case 'admin/vehicle/save-add':
        require_once './business/admin/vehicle.php';
        vehicle_save_add();
        break;
    case 'admin/vehicle/update':
        require_once './business/admin/vehicle.php';
        vehicle_update();
        break;
    case 'admin/vehicle/save-update':
        require_once './business/admin/vehicle.php';
        vehicle_save_update();
        break;
    case 'admin/vehicle/delete':
        require_once './business/admin/vehicle.php';
        vehicle_delete();
        break;
    case 'admin/vehicle/status':
        require_once './business/admin/vehicle.php';
        vehicle_status();
        break;
        //------------------------------------Đến tour-----------------------------------------------------
    case 'admin/tour/list':
        require_once './business/admin/tour.php';
        tour_list();
        break;
    case 'admin/tour/add':
        require_once './business/admin/tour.php';
        tour_add();
        break;
    case 'admin/tour/save-add':
        require_once './business/admin/tour.php';
        tour_save_add();
        break;
    case 'admin/tour/update':
        require_once './business/admin/tour.php';
        tour_update();
        break;
    case 'admin/tour/save-update':
        require_once './business/admin/tour.php';
        tour_save_update();
        break;
    case 'admin/tour/status':
        require_once './business/admin/tour.php';
        tour_status();
        break;
    case 'admin/tour/delete':
        require_once './business/admin/tour.php';
        tour_delete();
        break;
        //--------------------------Hết tour----------------------------------
    case 'admin/address/list':
        require_once './business/admin/address.php';
        address_list();
        break;
    case 'admin/address/add':
        require_once './business/admin/address.php';
        address_add();
        break;
    case 'admin/address/save-add':
        require_once './business/admin/address.php';
        address_save_add();
        break;
    case 'admin/address/update':
        require_once './business/admin/address.php';
        address_update();
        break;
    case 'admin/address/save-update':
        require_once './business/admin/address.php';
        address_save_update();
        break;
    case 'admin/address/status':
        require_once './business/admin/address.php';
        address_status();
        break;
    case 'admin/address/delete':
        require_once './business/admin/address.php';
        address_delete();
        break;


    
       
    default:
        echo "Đường dẫn bạn đang truy cập chưa được định nghĩa";
        break;
}
?>