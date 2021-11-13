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

function getSelect_id($table, $value, $email){
    $sql = "SELECT id FROM $table where $value = ?";
    return query_one($sql, $value, $email );
}

function getDelete($table, $id, $value){
    $sql = "DELETE FROM $table WHERE $id = ?";
    return execute($sql, $value);
}

function update_status($table, $value, $id){
    $sql = "UPDATE $table set trang_thai = ? where id = ?";
    return execute($sql, $value, $id);
}

// User
// function checkLogin($email) {
//     $sql = "SELECT * FROM khach_hang WHERE email=?";
//     return query_one($sql, $email);
// }

function insert_user($ten, $mat_khau, $email, $sdt, $ngay_them){
    $sql = "INSERT INTO khach_hang(ten, mat_khau, email, sdt, ngay_tao) VALUES (?, ?, ?, ?, ?)";
    execute($sql, $ten, $mat_khau, $email, $sdt, $ngay_them);
}

function update_user($ten, $mat_khau, $email, $sdt, $id){
    $sql = "UPDATE khach_hang set email = ?, mat_khau = ?, ten = ?, sdt = ? where id = ?";
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

?>