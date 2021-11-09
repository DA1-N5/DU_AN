
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['email']))
    {
        header('Location: index.php');
        exit();
    }

    if (isset($_POST['register']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($name) && !empty($password))
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $message = array('type' => 'danger', 'content' => 'Email invalid.');
            } else {
                $_SESSION['regName'] = $name;
                $_SESSION['regEmail'] = $email;
                $_SESSION['regPassword'] = $password;
                $message = array('type' => 'success', 'content' => 'Resgister successfully. <a href="login.php">Login now</a>');
            }
        } else {
            $message = array('type' => 'danger', 'content' => 'Can not be empty.');
        }
    }
?>
    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="register.php" method="post">
                <div class="auth-form--title">
                    <h1>Register your new account</h1>
                </div>
                <div class="auth-form--body">
                    <?php if (isset($message)) { ?>
                    <div class="alert <?= $message['type'] ?>">
                        <span><?= $message['content'] ?></span>
                    </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="name">Your name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="John Snowwhite">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="John.snowwhite@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="register">Register now</button>
                    <a href="login.php" class="btn btn-dark">
                        Login
                        <img src="https://www.nicepng.com/png/full/9-97633_right-arrow-white-png-right-arrow-png-white.png" class="btn-icon" style="margin-left: 1rem;width: 20px;height: 18px;"/>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>