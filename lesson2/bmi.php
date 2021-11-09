<?php
error_reporting(0);
if ($_POST['ok']) {
    if (empty($_POST['cao']) || empty($_POST['nang'])) {
        echo '<script>alert("Mời nhập Chỉ Số Chiều Cao, Cân Nặng");</script>';
    } else {
        $chieucao = (int) $_POST['cao'];
        $cannang = (int) $_POST['nang'];

        $bmi = $cannang * 10000 / ($chieucao * $chieucao);
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
            <label for="">Chiều Cao</label>
            <input type="number" name="cao">
            <br>
            <label for="">Cân Nặng</label>
            <input type="number" name="nang">
            <br>
            <button name="ok" value="ok">Tính BMI</button>
            <br>
            <p>
                Chỉ số BMI của bạn là: <?= $bmi; ?>
            </p>
        </form>
    </div>
</body>

</html>