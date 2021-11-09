<?php
$arr1 = [4, 1, 7, 9];
echo $arr1[0] . '<br>';
echo $arr1[1] . '<br>';

$arr2 = [
    'lop' => 'WE16305',
    'ca' => 1,
];

$arr3 = array(1, 3, 5, 6);
$arr4 = array(
    'mon_hoc' => 'PHP1',
    'mon_ky' => 'SU2021',
);

$arr2Chieu = [
    [1, 4, 9],
    [6, 7, 2],
    [9, 8, 5],
];

echo $arr2Chieu[0][1];

// thêm ptử vào mảng
//c1: Thêm ptử vào vị trí cuối cùng của mảng
$arr3[] = 101;
$arr2['sy_so'] = 40;

//c2: array_push thêm ptử vào cuối mảng
array_push($arr4, 8, 9, 10, 11, 12, 13, 14);

unset($arr2['sy_so']);

array_pop($arr3);


?>