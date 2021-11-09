<?php
    $choTrc1 = "15-4-2019";
    $choTrc2 = "24-7-2021";
    $date = date_diff(date_create($choTrc1), date_create($choTrc2));
    echo 'Khoảng cách giữa 2 ngày: ' . $choTrc1 . ' và ' . $choTrc2 . ' là: ' . $date->format('%a ngày');
?>