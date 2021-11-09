<?php
$a = +$_POST['a'];
$b = +$_POST['b'];
$kq = 0;
if ($a != 0) {
    $kq = - ($b) / $a;
    $nghiem = 'Phương Trình có nghiệm là: x = ' . $kq;
} else if ($a == 0 && $b == 0) {
    $nghiem = 'Phương trình có vô số nghiệm';
} else {
    $nghiem = 'Phương trình Vô Nghiệm';
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
        <h2>Giải PT ax + b = 0</h2>
        <form action="" method="POST">
            <label for="">Nhập a:</label>
            <input type="number" name="a">
            <br>
            <label for="">Nhập b:</label>
            <input type="number" name="b">
            <br>
            <button>Giải</button>
        </form>
        <h4>
            <?php echo $nghiem ?>
        </h4>
    </div>
</body>

</html>