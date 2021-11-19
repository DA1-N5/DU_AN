<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: $website/admin/log/login.php");
    die;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Quản Trị</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?=$website?>/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?=$website?>/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?=$website?>/css/AdminLTE.css">
    <link rel="stylesheet" href="<?=$website?>/css/_all-skins.min.css">
    <!-- <link rel="stylesheet" href="<?=$website?>/css/jquery-ui.css"> -->
    <!-- <link rel="stylesheet" href="<?=$website?>/css/style.css" /> -->
    <script src="<?=$website?>/js/angular.min.js"></script>
    <script src="<?=$website?>/js/app.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=$website?>/" class="logo">
                <span class="fa fa-home"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="" class="fa fa-bars" style="padding: 15px ; color:#fff" data-toggle="push-menu" role="button"></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=$url_images . $_SESSION['admin']['anh']?>" class="user-image">
                                <span class="hidden-xs"><?=$_SESSION['admin']['ten']?></span>

                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?=$url_images . $_SESSION['admin']['anh']?>" class="img-circle">

                                    <p>
                                        <?=$_SESSION['admin']['ten']?> - <?=intval($_SESSION['admin']['vai_tro']) == 1 ? "Nhân Viên" : "Quản Trị Viên"?>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-right">
                                        <form action="<?="$website/admin/log/log-out.php"?>" method="POST">
                                            <button class="btn btn-default btn-flat">Log Out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=$url_images . $_SESSION['admin']['anh'] ?>" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <p><?=$_SESSION['admin']['ten'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <?php
                    if($_SESSION['admin']['vai_tro'] == 2){
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cog"></i> <span>Quản Lí Admin</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href=""><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <?php
                    } else {

                    }
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Quản Lí User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website?>/admin/users/list.php"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=$website?>/admin/users/add.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản Lí Tour</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website?>/admin/tour/list.php"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=$website?>/admin/tour/add.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản Lí Đơn Hàng</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website?>/admin/don_hang/list.php"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-list-alt"></i> <span>Quản Lí Khách sạn</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website?>/admin/khach_san/list.php"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=$website?>/admin/khach_san/add.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản lí địa chỉ</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li><a href="<?=$website?>/admin/diachi/list.php"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=$website?>/admin/diachi/add.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                      
                         </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span>Quản lí phương tiện</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li><a href="<?=$website?>/admin/phuongtien/list.php"><i
                                        class="fa fa-circle-o"></i> Danh sách</a></li>
                            <li><a href="<?=$website?>/admin/phuongtien/add.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới</a></li>            
                         </ul>
                    </li>
                                     
                    
                </ul>
            </section>
        </aside>