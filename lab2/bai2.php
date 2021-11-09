<?php
$diem = $_GET['diem'];
if ($diem == '') {
    echo '<script>alert ("Bạn Chưa Nhập Điểm")</script>;';
} else if($diem > 10) {
    echo '<script>alert ("Điểm Sai")</script>;';
} else {
    if ($diem < 5) {
        $kq = 'Học lực Yếu';
    } else if ($diem < 6.5) {
        $kq = 'Học lực TB';
    } else if ($diem < 7.5) {
        $kq = 'Học lực Khá';
    } else if ($diem < 9) {
        $kq = 'Học lực Giỏi';
    } else if ($diem <= 10) {
        $kq = 'Học lực Xuất sắc';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
        <form action="" method="GET">
            <label for="">Mời nhập Điểm: </label>
            <input type="number" name="diem">
            <button>Lực học</button>
        </form>
        <h4>
            <?php echo $kq ?>
        </h4>
    </div>
</body>

</html>