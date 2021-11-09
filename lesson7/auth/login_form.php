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
    <div class="col-8 offset-2">
        <form action="http://localhost/WE16305/lesson7/auth/login.php" method="POST">
            <div>
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>