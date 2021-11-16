<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?=$website?>/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=$website?>/css/user.css">
    <link rel="stylesheet" href="<?=$website?>/css/tour.css">
    <link rel="stylesheet" href="<?=$website?>/css/chitiettour.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<style>
    a {
    text-decoration: none;
    }

    .cart {
        position: relative;
    }

    .number {
        position: absolute;
        top: 1;
        left: 1;
        bottom: 1;
        right: 1;
        cursor: pointer;
    }
</style>

<body>
    <header>
        <?php
            if(isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
        ?>
        <div id="menu-bar" class="fas fa-bars"></div>
        
        <a href="<?=$website?>/" class="logo">VNTRAVEL</a>

        <nav class="navbar">
        <a href="">Trang Chủ</a>
        <a href="">Giới Thiệu</a>
        <span>
            <select class="form-select" style="font-size: 17px; border:none;" name="ma_loai" onchange="location = this.value;">
                <option selected>Danh Mục Tour</option>
                <option value=""></option>
            </select>
        </span>
        <style>
            .container-2{
            vertical-align: middle;
            white-space: nowrap;
            position: relative;
            }
            .container-2 input#search{
            width: 50px;
            height: 50px;
            background: #fff;
            border: none;
            font-size: 10pt;
            float: left;
            color: #000;
            padding-left: 40px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            color: #000;
            
            -webkit-transition: width .55s ease;
            -moz-transition: width .55s ease;
            -ms-transition: width .55s ease;
            -o-transition: width .55s ease;
            transition: width .55s ease;
            
            }

            .container-2 input#search::-webkit-input-placeholder {
            color: #000;
            }
            .container-2 input#search:-moz-placeholder { /* Firefox 18- */
            color: #000;  
            }
            .container-2 input#search::-moz-placeholder {  /* Firefox 19+ */
            color: #000;  
            }
            .container-2 input#search:-ms-input-placeholder {  
            color: #000;  
            }

            .container-2 .icon{
            position: absolute;
            top: 50%;
            margin-left: 20px;
            margin-top: 18px;
            z-index: 1;
            color: #000;
            background: none;
            }
            .container-2 input#search:focus, .container-2 input#search:active{
                outline:none;
            }
            .container-2:hover input#search{
                outline:none; 
                width: 150px;
                background: #ccc;
                color: #000;
            }
            .container-2:hover .icon{
                color: #000;
                background: none;
            }
        </style>
        <span>
            <div class="box">
                <form action="find.php" method="POST" class="container-2">
                    <button class="icon"><i class="fas fa-search"></i></button>
                    <input type="search" name="search" id="search" placeholder="Search..." />
                </form>
            </div>
        </span>
        </nav>

        <div class="icons">
            <span>
                <a href="" type="submit"><i class="fas fa-shopping-bag cart"></i></a>
                <span class="number"><?php echo isset($sosp) ? intval($sosp) : 0 ?></span>
            </span>
            <?php
            if(isset($_SESSION['user'])){
            ?>
                <a href='#' class='fas fa-edit'></a>
                <a href='<?=$website?>/log/log-out.php'><i class='fas fa-user-times'></i></a>
            <?php
            } else {
            ?>
                <a href='<?=$website?>/log/loginform.php'><i class='fas fa-user'></i></a>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION['admin'])){
            ?>
                <a href='<?=$website?>/admin' class='fas fa-users-cog'></a>
            <?php
            }
            ?>
        </div>
              

    </header>