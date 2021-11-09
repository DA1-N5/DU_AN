<?php

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
    <form action="/WE16305/lesson3/hello.php" method="POST">
        <div>
        <label for="">Số Thứ Nhất</label>
        <input type="number" name="so_thu_nhat">
        </div>
        <div>
        <label for="">Số Thứ Hai</label>
        <input type="number" name="so_thu_hai">
        </div>
        <button name="toan_tu" value="cong">+</button>
        <button name="toan_tu" value="tru">-</button>
        <button name="toan_tu" value="nhan">x</button>
        <button name="toan_tu" value="chia">:</button>
        <button name="toan_tu" value="chia_du">%</button>
    </form>
</body>
</html>