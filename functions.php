<?php
require_once("connect_DB.php");
function getSelect($table,$start, $quantity){
    $sql = "SELECT * FROM $table order by ngay_tao desc limit $start,$quantity";
    return query($sql);
}

function getSelect_one($table, $id, $value){
    $sql = "SELECT * FROM $table where $id = ?";
    return query_one($sql, $value);
}

function getDelete($table, $id, $value){
    $sql = "DELETE FROM $table WHERE $id = ?";
    return execute($sql, $value);
}

function update_status($table, $value, $id){
    $sql = "UPDATE $table set trang_thai = ? where id = ?";
    execute($sql, $value, $id);
}

// User

function insert_user($email, $mat_khau, $ten, $sdt, $ngay_them){
    $sql = "INSERT INTO khach_hang(email, mat_khau, ten, sdt, ngay_tao) VALUES (?, ?, ?, ?, ?)";
    execute($sql, $email, $mat_khau, $ten, $sdt, $ngay_them);
}

function update_user($email, $mat_khau, $ten, $sdt, $id){
    $sql = "UPDATE khach_hang set email = ?, mat_khau = ?, ten = ?, sdt = ? where id = ?";
    execute($sql, $email, $mat_khau, $ten, $sdt, $id);
}
// Địa chỉ ----------------------------------------------------------------------
function insert_diachi($dia_chi,$ngay_tao,$trang_thai,$id){
    $sql = "INSERT INTO dia_chi(dia_chi, ngay_tao, trang_thai,id) VALUES(?, ?, ?, ?)";
    execute($sql, $dia_chi, $ngay_tao, $trang_thai, $id);
}
function update_diachi($dia_chi,$ngay_tao,$trang_thai,$id){
    $sql = "UPDATE dia_chi set dia_chi = ?, ngay_tao = ?, trang_thai = ? where id = ?";
    execute($sql,$dia_chi, $ngay_tao, $trang_thai, $id);
}
// Tour----------------------------------------------------------------------------

?>