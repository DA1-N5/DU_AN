<?php
$arr = [1, 4, 7, 2, 9, 8, 6];

function findMax(){
    global $arr;
    $a = $arr[0];
    for($i = 0; $i < count($arr) ;$i++){
        if($arr[$i] > $a){
            $a = $arr[$i];
            
        }
    }
    echo $a;
}
findMax();

echo '<br>';

function findMin(){
    global $arr;
    $a = $arr[0];
    for($i = 0; $i < count($arr) ;$i++){
        if($arr[$i] < $a){
            $a = $arr[$i];
        }
    }
    echo $a;
}

findMin();
?>