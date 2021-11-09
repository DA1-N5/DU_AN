<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
        table{
            width: 100%;
        }
        th{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>

    <?php
        $connection = new PDO("mysql:host=127.0.0.1;dbname=Day10;charset=utf8","root");
        /*
            PDO: PHP Data Object là 1 class cung cấp các phương thức để kết nối và truy xuất DB
        */ 
        $query = "select * from users";
        $stmt = $connection->prepare($query);
        /*
            -> dùng để truy cập vào phương thức
            prepare() : phương thức chuẩn bị 1 câu lệnh SQL
        */ 
        $stmt->execute();
        $users = $stmt->fetchAll();
        // echo '<pre>';
        // var_dump($users);

        // var_dump($users[0]);
        // echo $users[0]['username'];
        // echo $users[0]['password'];
    ?>
    <div>Thông tin tài khoản</div>
    <a href="add-user.php">Thêm mới user</a>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
          
            <?php foreach($users as $u):?>
                <tr>
                    <td><?php echo $u['username'];?></td>
                    <td><?php echo $u['password'];?></td>
                    <td><a href="update-user.php?id=<?php echo $u['id']?>">Sua</a></td>
                    <td><a href="delete-user.php?id=<?php echo $u['id']?>">Xoa</a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>