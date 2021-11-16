<?php
require_once("connect_DB.php");
function getSelect($table,$start, $quantity){
    $sql = "SELECT * FROM $table order by ngay_tao desc limit $start,$quantity";
    return query($sql);
}

function getSelect_one($table, $value, $email){
    $sql = "SELECT * FROM $table where $value = ?";
    return query_one($sql, $email);
}

function getDelete($table, $id, $value){
    $sql = "DELETE FROM $table WHERE $id = ?";
    return execute($sql, $value);
}

function update_status($table, $value, $id){
    $sql = "UPDATE $table set trang_thai = ? where id = ?";
    return execute($sql, $value, $id);
}

function insert_user($ten, $mat_khau, $email, $sdt, $ngay_them){
    $sql = "INSERT INTO khach_hang(ten, mat_khau, email, sdt, ngay_tao) VALUES (?, ?, ?, ?, ?)";
    execute($sql, $ten, $mat_khau, $email, $sdt, $ngay_them);
}

function update_user($ten, $mat_khau, $email, $sdt, $id){
    $sql = "UPDATE khach_hang set ten = ?, mat_khau = ?, email = ?, sdt = ? where id = ?";
    execute($sql, $ten, $mat_khau, $email, $sdt, $id);
}

function check_email_existed($email) {
    $sql = "SELECT email FROM khach_hang WHERE email=?";
    return query_one($sql, $email);
}
// Địa chỉ ----------------------------------------------------------------------
function insert_diachi($dia_chi,$ngay_tao){
    $sql = "INSERT INTO dia_chi(dia_chi, ngay_tao) VALUES(?, ?)";
    execute($sql, $dia_chi, $ngay_tao);
}
function update_diachi($dia_chi, $id){
    $sql = "UPDATE dia_chi set dia_chi = ? where id = ?";
    execute($sql,$dia_chi, $id);
}

// Tour----------------------------------------------------------------------------


// Khách sạn------------------------------------------------------------------------
function insert_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$trang_thai,$ngay_tao) {
    $sql = "INSERT INTO khach_san(ten_ks,anh,mo_ta,id_dc,dia_chi_ct,sdt,trang_thai,ngay_tao) values(?,?,?,?,?,?,?,?)";
    return execute($sql, $ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$trang_thai,$ngay_tao);
}

function select_ks() {
    $sql = "SELECT * FROM khach_san";
    return query($sql);
}

function update_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id){
    $sql = "UPDATE khach_san set ten_ks = ?,anh = ?,mo_ta = ?,id_dc = ?,dia_chi_ct = ?,sdt = ? where id = ?";
    return execute($sql,$ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
}

// Phương tiện----------------------------------
function insert_phuongtien($ten, $bien_so, $so_ghe, $anh, $ngay_tao){
    $sql = "INSERT INTO phuong_tien(ten, bien_so, so_ghe, anh, ngay_tao) VALUES(?, ?, ?, ?, ?)";
    execute($sql, $ten, $bien_so, $so_ghe, $anh, $ngay_tao);
}
function update_phuongtien($ten, $bien_so, $so_ghe,$anh, $id){
    $sql = "UPDATE phuong_tien set ten = ?, bien_so =?, so_ghe = ?, anh = ? where id = ?";
    execute($sql, $ten, $bien_so, $so_ghe,$anh, $id);
}
//Tour----------------------------------------------------
function insert_tour($ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia ,$ngay_tao){
    $sql = "INSERT INTO tour(ten, id_diachi, anh, id_danhmuc, ngay_di, ngay_den, mo_ta, thong_tin, gia , ngay_tao) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia ,$ngay_tao);
}
function update_tour($ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia, $ngay_sua, $id){
    $sql = "UPDATE tour set ten = ?, id_diachi = ?, anh = ? ,id_danhmuc = ?, ngay_di = ?, ngay_den = ?, mo_ta =?, thong_tin = ?, gia = ?, ngay_sua = ? where id = ?";
    execute($sql, $ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
}
?>
