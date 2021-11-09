<?php
$a = $_POST['ab'];
$b = $_POST['bb'];
$kq = 0;
$dem = 0;
if ($a == '' || $b == '') {
    echo '<script>alert ("Bạn Chưa Nhập Số")</script>;';
} else {
    for ($i = $a; $i <= $b; $i++) {
        if ($i % 2 == 0) {
            $listSC[$dem] = $i;
            $dem++;
            $kq += $i;
        }
    }
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
        <form action="" method="POST">
            <label for="">nhập vào a:</label>
            <input type="number" name="ab">
            <br>
            <label for="">nhập vào b:</label>
            <input type="number" name="bb">
            <br>
            <button>Tìm</button>
        </form>
        <ul>
            <h2>Các số chẵn</h2>
            <?php
            for ($i = 0; $i < count($listSC); $i++) {
                echo "<li>" . $listSC[$i] . "</li>";
            }
            ?>
        </ul>
        <h4>Tổng <?php echo $dem; ?> số chẵn từ a -> b là : <?php echo $kq; ?></h4>

    </div>
</body>

</html>