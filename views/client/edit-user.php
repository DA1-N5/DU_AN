<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/login.css">
</head>

<body>

    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="<?= BASE_URL ?>/client/save-info" method="post" enctype="multipart/form-data" style="width: 400px; object-position: center;">
                <div class="auth-form--title">
                    <h1 style="text-align: center; margin-bottom: 20px;">Thông tin tài khoản</h1>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <div class="auth-form--body">
                    <div class="mb-3">
                        <label for="avatar" style="width: 100px; height: 100px; margin-left: 150px;; border: 3px solid black; border-radius: 50%; text-align: center; cursor: pointer; font-size: 6.5rem;"><i class="far fa-user-circle"></i></label>
                        <input type="file" class="form-control" hidden name="avatar" id="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" name="email" id="name" value="<?= $user['email'] ?>" disabled style="text-transform: none; font-size: 20px;">
                    </div>
                    <div class="mb-3">
                        <label for="name">Họ Tên</label>
                        <input type="text" class="form-control" name="ten" id="name" value="<?= $user['ten'] ?>" style="text-transform: none; font-size: 20px;">
                    </div>
                    <div class="mb-3">
                        <label for="sdt">SĐT</label>
                        <input type="text" class="form-control" name="sdt" id="sdt" value="<?= $user['sdt'] ?>" style="text-transform: none; font-size: 20px;">
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="register">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>