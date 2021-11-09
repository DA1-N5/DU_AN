<?php
require_once './../../db/khach_hang.php';
$result = getAll();
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
            <div class="col-6">
                <a href="/WE16305/lesson7/admin/users/form-create.php" class="btn btn-success">Create</a>
                <a href="/WE16305/lesson7/admin/users/find.html" class="btn btn-success">Find</a>
            </div>
            <div class="col-6"></div>
        </div>
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
                    <?php for ($i=0; $i < count($result); $i++) { ?>
                        <tr>
                            <td>
                                <?php echo $result[$i]['id'] ?>
                            </td>
                            <td>
                                <?php echo $result[$i]['ma'] ?>
                            </td>
                            <td>
                                <?php echo $result[$i]['ten'] ?>
                            </td>
                            <td>
                                <?php echo $result[$i]['gioi_tinh'] ?>
                            </td>
                            <td>
                                <?php echo $result[$i]['sdt'] ?>
                            </td>
                            <td>
                                <?php echo $result[$i]['dia_chi'] ?>
                            </td>
                            <td>
                                <?php echo $result[$i]['email'] ?>
                            </td>
                            <td>
                                <img src="<?php echo $result[$i]['avatar'] ?>" alt="">
                            </td>
                            <td>
                                <a href="/WE16305/lesson7/admin/users/edit.php?id=<?php echo $result[$i]['id'] ?>" class="btn btn-primary">Update</a>
                            </td>
                            <td>
                                <a href="/WE16305/lesson7/admin/users/delete.php?id=<?php echo $result[$i]['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>