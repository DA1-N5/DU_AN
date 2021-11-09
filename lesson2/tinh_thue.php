<?php
$thuNhap = $_GET['luong'];
$thue = '';

if ($thuNhap <= 9000000) {
    $thue = 'Không Đóng Thuế';
    echo '<br>';
} elseif ($thuNhap <= 15000000) {
    $thue = $thuNhap * (10 / 100);
} elseif ($thuNhap <= 30000000) {
    $thue = $thuNhap * (15 / 100);
} elseif ($thuNhap > 30000000) {
    $thue = $thuNhap * (20 / 100);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="/WE16305/lesson2/tinh_thue.php" method="GET">
            <label for="">Thu Nhập</label>
            <input type="number" name=luong>
            <button>Tính Thuế</button>
        </form>

        <p>
            <?php echo $thue; ?>
        </p>

    </div>
</body>

</html>