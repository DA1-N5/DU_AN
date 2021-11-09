<?php
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
function check($a, $b, $c)
{
    if (
        empty($a) ||
        empty($b) ||
        empty($c)
    ) {
        return false;
    }
    if (
        $a > 31 ||
        $b > 12 ||
        $c < date('Y')
    ) {
        return false;
    }
    return true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <lable>Nhập vào ngày kết thúc block</lable>
        <br>
        <label for="">Ngày</label>
        <input type="number" name="day">
        <br>
        <label for="">Tháng</label>
        <input type="number" name="month">
        <br>
        <label for="">Năm</label>
        <input type="number" name="year">
        <br>
        <button>Xem</button>
    </form>
    <p>
        <?php
        if (check($day, $month, $year) == true) {
            $dayComplete = $day . '-' . $month . '-' . $year;
            $dayStart = '28-6-2021';
            $dayNow = date('d-m-Y');
            $date1 = date_diff(date_create($dayStart), date_create($dayComplete));
            $date2 = date_diff(date_create($dayNow), date_create($dayComplete));
        
            echo 'Có: ' . $date1->format('%a ngày <br>');
            echo 'Và còn ' . $date2->format('%a ngày nữa <br>');

            $songay = (int) ((strtotime($dayComplete) - strtotime(date("Y/m/d", time()))) / (3600 * 24));

            $ngayhoc = 0;
            $dem = date("w", time()) + 1;
            for ($i = 1; $i <= $songay; $i++)
            {
                if ($dem == 3 || $dem == 5 || $dem == 7) {
                    $ngayhoc++;
                }
                $dem++;
                if ($dem == 8) {
                    $dem = 1;
                }
            }
            echo 'Biết học vào Thứ 3-5-7 hàng tuần <br>';
            echo 'Còn lại ' . $ngayhoc . ' buổi học <br>';
        }else {
            echo '<script>alert("Lỗi!")</script>';
        }

        ?>
        
    </p>
</body>

</html>