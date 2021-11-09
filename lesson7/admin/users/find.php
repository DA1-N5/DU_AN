<?php
require_once './../../db/khach_hang.php';

$id = $_POST["id"];

$result = findByID($id);

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
<div class="container mt-5">
    <div class="row">
        <h2 style="text-align: center;">Thông Tin Khách Hàng</h2>
        <br>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Mã Khách hàng</td>
                    <td>Tên KH</td>
                    <td>Giới Tính</td>
                    <td>SĐT</td>
                    <td>Địa Chỉ</td>
                    <td>Email</td>
                    <td colspan="2">Thao Tác</td>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>
                            <?php echo $result['id'] ?>
                        </td>
                        <td>
                            <?php echo $result['ma'] ?>
                        </td>
                        <td>
                            <?php echo $result['ten'] ?>
                        </td>
                        <td>
                            <?php echo $result['gioi_tinh'] ?>
                        </td>
                        <td>
                            <?php echo $result['sdt'] ?>
                        </td>
                        <td>
                            <?php echo $result['dia_chi'] ?>
                        </td>
                        <td>
                            <?php echo $result['email'] ?>
                        </td>
                        <td>
                            <a href="/WE16305/lesson7/admin/users/edit.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <a href="/WE16305/lesson7/admin/users/delete.php?id=<?php echo $result['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div>
        <a href="/WE16305/lesson7/admin/users/index.php" class="btn btn-default">Quay lại</a>
    </div>
</div>
</body>
</html>