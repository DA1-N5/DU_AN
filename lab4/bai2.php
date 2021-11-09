<?php
    $format = 'D, M , d/m/Y';
    $choTrc = '20-6-2019';
    echo 'Ngày đầu tiên của tháng: ' . date($format, strtotime('first day of' .$choTrc));
    echo '<br>';
    echo 'Ngày cuối cùng của tháng: ' . date($format, strtotime('last day of' . $choTrc));
?>