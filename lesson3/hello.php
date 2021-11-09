<?php
function cong($x, $y){
    $kq = $x + $y;
    return $kq;
}
function tru($x, $y){
    $kq = $x - $y;
    return $kq;
}
function nhan($x, $y){
    $kq = $x * $y;
    return $kq;
}
function chia($x, $y){
    $kq = $x / $y;
    return $kq;
}
function chia_du($x, $y){
    $kq = $x % $y;
    return $kq;
}
function xuly(){
    $a = $_POST['so_thu_nhat'];
    $b = $_POST['so_thu_hai'];
    $toanTu = $_POST['toan_tu'];
    switch ($toanTu) {
    case 'cong':
        echo cong($a, $b);
        break;
    case 'tru':
        echo tru($a, $b);
        break;
    case 'nhan':
        echo nhan($a, $b);
        break;
    case 'chia':
        echo chia($a, $b);
        break;
    case 'chia_du':
        echo chia_du($a, $b);
        break;
    }
}

function testInput(){
    if (
        empty($_POST['so_thu_nhat']) ||
        empty($_POST['so_thu_hai']) ||
        empty($_POST['toan_tu'])
    ) {
        return false; 
    }
    if (
        ($_POST['toan_tu'] != 'chia' || $_POST['toan_tu'] != 'chia_du') &&
        !isset($_POST['so_thu_hai'])
    ) {
        return false; 
    }
    return true;
}
$test = testInput();
if ($test == true) {
    xuly();
} else {
    echo "<script>alert('Bạn chưa nhập dữ liệu');</script>";
}
echo '<a href="/WE16305/lesson3/calculator.php">quay lại</a>';