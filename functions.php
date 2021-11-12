<?php
require_once("connect_DB.php");
function getSelect($table){
    $sql = "SELECT * FROM $table order by ngay_them desc";
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
?>