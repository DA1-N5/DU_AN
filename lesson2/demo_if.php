<?php

$diem = [
    'lap_1' => 7,
    'lap_2' => 8,
    'lap_3' => 6,
    'lap_4' => 4,
    'lap_5' => 9,
    'lap_6' => 8,
    'lap_7' => 7,
    'lap_8' => 8,
    'assignment' => 5,
];

if ($diem['assignment'] < 5) {
    echo "Không đủ điều kiện dự thi";
} else if ($diem['assignment'] < 7) {
    echo "Sinh viên khá";
} else if ($diem['assignment'] < 8) {
    echo "Sinh viên Giỏi";
} else {
    echo "Sinh viên ong vàng";
}

echo '<br>';

$diemTK = 'B';

switch ($diemTK) {
    case 'A':
        echo 'Sinh Viên Ong Vàng';
        break;
    case 'B':
        echo 'Sinh Viên Giỏi';
        break;
    case 'C':
        echo 'Sinh Viên Khá';
        break;
    case 'D':
        echo 'Sinh Viên Trung Bình';
        break;
    case 'F':
        echo 'Không Qua Môn';
        break;
    default:
        # code...
        break;
}

