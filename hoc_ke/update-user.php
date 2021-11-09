<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            $id= $_GET['id'];
            $connection = new PDO("mysql:host=127.0.0.1;dbname=Day10;charset=utf8","root");
            $query = "select * from users where id=$id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $user = $stmt->fetch();
    ?>
    <form action="save-update.php" method="POST">
        <div>
            <input type="text" name="user-id" value="<?php echo $user['id']?>" hidden>
        </div>
        <div>
            <input type="text" name="username" value="<?php echo $user['username'];?>">
        </div>
        <div>
            <input type="text" name="password" value="<?php echo $user['password'];?>">
        </div>
        <div>
            <input type="submit" name="btn-update" value="update">
        </div>



    </form>
</body>
</html>