<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['email']))
    {
        header('Location: login.php');
        die();
    }
    if (isset($_POST['logout']))
    {
        session_destroy();
        header('Location: login.php');
    }
    ?>

    <div class="wrapper">
        <div class="card">
            <h2>Xin chào</h2>
            <h1><?= isset($_SESSION['name']) ? $_SESSION['name'] : $_SESSION['email'] ?></h1>
            <form action="index.php" method="post">
                <button type="submit" name="logout" class="btn">Đăng xuất</button>
            </form>
        </div>
    </div>
</body>

</html>