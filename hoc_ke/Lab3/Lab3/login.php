
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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

    if (isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $regName = isset($_SESSION['regName']) ? $_SESSION['regName'] : "Phuongthao trinh";
        $regEmail = isset($_SESSION['regEmail']) ? $_SESSION['regEmail'] : "thaotpph13269@gmail.com";
        $regPassword =isset($_SESSION['regPassword']) ? $_SESSION['regPassword'] : "12345678";

        if (!empty($email) && !empty($password)) 
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $message = array('type' => 'danger', 'content' => 'Email invalid.');
            } else {
                if ($email == $regEmail && $password == $regPassword)
                {
                    $_SESSION['email'] = $regEmail;
                    $_SESSION['name'] = $regName;  
                    header('Location: index.php');
                } else {
                    $message = array('type' => 'danger', 'content' => 'Email or password invalid.');
                }
            }
        } else {
            $message = array('type' => 'danger', 'content' => 'Can not be empty.');
        }
    }
?>
    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="login.php" method="post">
                <div class="auth-form--title">
                    <span>Welcome back</span>
                    <h1>Login to your account</h1>
                </div>
                <div class="auth-form--body">
                    <?php if (isset($message)) { ?>
                    <div class="alert <?= $message['type'] ?>">
                        <span><?= $message['content'] ?></span>
                    </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="John.snowwhite@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="******">
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-group-checkbox">
                            <label for="remember_me">
                                <input type="checkbox" class="form-control-checkbox" name="remember_me" id="remember_me">
                                Remember me
                            </label>
                        </div>
                        <a href="javascript:void(0)">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="login">Login now</button>
                    <button type="button" class="btn btn-dark">
                        <img src="https://cdn.iconscout.com/icon/free/png-256/google-2981831-2476479.png" class="btn-icon"/>
                        Or sign-in with google</button>
                </div>
            </form>
            <span class="link-join">Dont have an account? <a href="register.php">Join free today</a></span>
        </div>
    </div>
</body>
</html>