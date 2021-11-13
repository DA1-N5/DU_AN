
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./../css/login.css">

</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="" method="post">
                <div class="auth-form--title">
                    <h1>Nhập Email của tài khoản</h1>
                </div>
                <div class="auth-form--body">
                    
                    <div class="mb-3">
                        <span style="color: red;">
                        <?php 
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="" placeholder="snowwhite@gmail.com">
                    </div>
                    
                    <button type="submit" class="btn btn-blue mb-3" name="login">Gửi</button>
                    
                </div>
                <?php require 'login.php'; ?>
            </form>
        </div>
    </div>
</body>
</html>