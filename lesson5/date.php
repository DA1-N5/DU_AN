<?php
    /*
        Y: năm - định dạng năm với 4 số
        m: tháng
        d: ngày
        D: thứ
        M: tên tháng
        y: định dạng năm vs 2 số cuối

        H: giờ
        i: phút
        s: giây
    */
    $fomat = 'D, M, d-m-Y - - H:i:s';
    // $tg = 'H:i:s';
    // $hour = strtotime("+ 1hour");
    // echo date("$fomat $tg");
    // echo '<br>';
    // echo date("$fomat $tg", $hour);

    echo date($fomat, strtotime('2021-08-04'));
    echo "<br>";
    echo date($fomat, strtotime("2021-08-04 last Monday"));
    
    echo "<br>";
    $startDateStr = '28-06-2021';
    $endDate = date($fomat, strtotime($startDateStr . ' +7 week last Saturday'));
    echo $endDate;
?>