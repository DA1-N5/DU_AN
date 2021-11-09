<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/WE16305/lesson7/bootstrap.min.css">
</head>

<body>
    <?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
    <form class="col-8 offset-2" method="POST" action="/WE16305/lesson7/admin/users/create.php" enctype="multipart/form-data">
        <div class="mt-3">
            <label>Mã</label>
            <input class="form-control" type="text" name="ma">
        </div>
        <div class="mt-3">
            <label>Tên</label>
            <input class="form-control" type="text" name="ten">
        </div>
        <div class="mt-3">
            <label>Email</label>
            <input class="form-control" type="email" name="email">
        </div>
        <div class="mt-3">
            <label>SĐT</label>
            <input class="form-control" type="text" name="sdt">
        </div>
        <div class="mt-3">
            <label>Địa chỉ</label>
            <input class="form-control" type="text" name="address">
        </div>
        <div class="mt-3">
            <label>Ảnh</label>
            <input class="form-control" type="file" name="avatar">
        </div>
        <div class="mt-3">
            <label>Giới Tính</label>
            <select name="gender" id="" class="form-control">
                <option value="2">Nữ</option>
                <option value="1">Nam</option>
            </select>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/WE16305/lesson7/admin/users/index.php" class="btn btn-default">Cancel</a>
        </div>
    </form>
</body>

</html>