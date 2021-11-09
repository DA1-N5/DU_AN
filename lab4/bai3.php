<?php
    $arrayFirst = array('abcde', 'abc', 'de', 'tvhd', 'a', 'one');
    $arrayNext = array_map('strlen', $arrayFirst);

    echo 'Chuỗi ngắn nhất trong mảng có độ dài ngắn nhất là: ' . min($arrayNext) . '<br>';
    echo 'Chuỗi ngắn nhất trong mảng có độ dài dài nhất là: ' . max($arrayNext) . '<br>';
?>