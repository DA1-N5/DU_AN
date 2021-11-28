<?php
function client_homepage()
{
    if (isset($_POST['submit'])) {
        extract($_REQUEST);
        if (empty($ngay_di) && empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour";
            $tour = query($sql);
        } else if (!empty($ngay_di) && empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour where ngay_di = '$ngay_di'";
            $tour = query($sql);
        } else if (empty($ngay_di) && !empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour where id_diachi = '$dia_chi'";
            $tour = query($sql);
        } else if (empty($ngay_di) && empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql = "SELECT * FROM tour where gia >= '$pre' and gia <= '$next'";
            } else {
                $value = $values;
                $sql = "SELECT * FROM tour where noi_di like '%$value%'";
            }
            $tour = query($sql);
        } else if (!empty($ngay_di) && !empty($dia_chi) && empty($values)) {
            $sql = "SELECT * FROM tour where ngay_di = '$ngay_di' and id_diachi = '$dia_chi'";
            $tour = query($sql);
        } else if (empty($ngay_di) && !empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql = "SELECT * FROM tour where id_diachi = '$dia_chi' and gia > '$pre' and gia < '$next'";
            } else {
                $value = $values;
                $sql = "SELECT * FROM tour where id_diachi = '$dia_chi' and noi_di like '%$value%'";
            }
            $tour = query($sql);
        } else if (!empty($ngay_di) && empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql = "SELECT * FROM tour where ngay_di = '$ngay_di' and gia > '$pre' and gia < '$next'";
            } else {
                $value = $values;
                $sql = "SELECT * FROM tour where ngay_di = '$ngay_di' and (noi_di like '%$value%')";
            }
            $tour = query($sql);
        } else if (!empty($ngay_di) && !empty($dia_chi) && !empty($values)) {
            if (intval($values) > 0) {
                $pre = (intval($values) * (90 / 100));
                $next = (intval($values) * (110 / 100));
                $sql =  "SELECT * FROM  tour where  ngay_di = '$ngay_di' and id_diachi = '$dia_chi' and (gia > '$pre' and gia < '$next')";
            } else {
                $value = $values;
                $sql =  "SELECT * FROM  tour where  ngay_di = '$ngay_di' and id_diachi = '$dia_chi' and (noi_di like '%$value%')";
            }
            $tour = query($sql);
        }
    } else if (isset($_GET['ct'])) {
        $tour = tour_by_category(intval($_GET['ct']));
    } else {
        $tour = getSelect("tour", 0, 10);
    }

    $category = getSelect("danh_muc", 0, 10);
    $address = getSelect('dia_chi', 0, 10);
    client_render('homepage.php', ["result" => $tour, "category" => $category, "address" => $address]);
}
function client_detail()
{
    $value = getSelect_one("tour", "id", intval($_GET['id']));
    $comment = [];
    client_render('detail.php', [
        "value" => $value,
        "comment" => $comment
    ]);
}
function client_login()
{
    extract($_REQUEST);
    if (empty($email) || empty($mat_khau)) {
        $_SESSION['error'] = 'Không được để trống.';
        header("location: $website/log/loginform.php");
        die;
    }
    $user = getSelect_one('khach_hang', 'email', $email);

    if (empty($user) || md5($mat_khau) != $user['mat_khau']) {
        $_SESSION['error'] = 'Mật khẩu hoặc tài khoản không đúng.';
        header("location: $website/log/loginform.php");
        die;
    }
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "<script>alert('Đăng nhập thành công.');</script>";
    if (isset($_SESSION['id_tour'])) {
        $id_tour = $_SESSION['id_tour'];
        unset($_SESSION['id_tour']);
        header("location: $website/tour-detail.php?id=$id_tour");
        die;
    }
    header("Location: $website/");
}
