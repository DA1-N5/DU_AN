<?php
function admin_dashbroard(){
    $admin = getSelectAll('admin');
    $khach_hang = getSelectAll('khach_hang');
    $tour = getSelectAll('tour');
    $don_hang = getSelectAll('don_hang');
    $slider = getSelectAll('slider');
    admin_render("dashbroard.php", [
        'admin' => $admin,
        'khach_hang' => $khach_hang,
        'tour' => $tour,
        'don_hang' => $don_hang,
        'slider' => $slider,
    ]);
}
?>