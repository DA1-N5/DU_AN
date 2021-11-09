<?php
    $arrayNumber = array(12, 11, 30, 15, 16, 45, 21, 8, 30, 25, 34);
    $tong = 0;
    foreach($arrayNumber as $so){
        $tong += $so;
    }
    $avg = $tong/count($arrayNumber);
    echo 'Giá trị trung bình: ' . $avg . '<br>';
    echo '5 số lớn nhất: ';
    function findMax(){
        global $arrayNumber;
        sort($arrayNumber);
        for($i = 0; $i < 5 ;$i++){
            echo $arrayNumber[$i] . ',';
        }
    }
    findMax();
    
    echo '<br>';
    echo '5 số nhỏ nhất: ';
    function findMin(){
        global $arrayNumber;
        rsort($arrayNumber);
        for($i = 0; $i < 5 ;$i++){
            echo $arrayNumber[$i] . ',';
        }
    }
    
    findMin();
?>