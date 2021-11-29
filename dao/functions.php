<?php
// General -------------------------------------------------
function getSelect($table,$start, $quantity){
    $sql = "SELECT * FROM $table order by ngay_tao desc limit $start,$quantity";
    return query($sql);
}

function getSelect_one($table, $value, $email){
    $sql = "SELECT * FROM $table where $value = ?";
    return query_one($sql, $email);
}

function getDelete($table, $id, $value){
    $sql = "DELETE FROM $table WHERE $id = ?";
    return execute($sql, $value);
}

function update_status($table, $value, $id){
    $sql = "UPDATE $table set trang_thai = ? where id = ?";
    execute($sql, $value, $id);
}
function getSelect_by_id($table,$id, $value){
    $sql = "SELECT * FROM $table where $id = $value order by ngay_tao desc ";
    return query($sql);
}

// User ---------------------------------------------------
function insert_user($ten, $mat_khau, $email, $sdt, $ngay_them){
    $sql = "INSERT INTO khach_hang(ten, mat_khau, email, sdt, ngay_tao) VALUES (?, ?, ?, ?, ?)";
    execute($sql, $ten, $mat_khau, $email, $sdt, $ngay_them);
}

function update_user($ten, $mat_khau, $email, $sdt, $id){
    $sql = "UPDATE khach_hang set ten = ?, mat_khau = ?, email = ?, sdt = ? where id = ?";
    execute($sql, $ten, $mat_khau, $email, $sdt, $id);
}

function update_user_one($mat_khau, $email) {
    $sql = "UPDATE khach_hang set mat_khau = ? where email = ?";
    return execute($sql, $mat_khau, $email);
}

function check_email_existed($email) {
    $sql = "SELECT email FROM khach_hang WHERE email=?";
    return query_one($sql, $email);
}

// Địa chỉ ------------------------------------------------
function insert_diachi($dia_chi,$ngay_tao){
    $sql = "INSERT INTO dia_chi(dia_chi, ngay_tao) VALUES(?, ?)";
    execute($sql, $dia_chi, $ngay_tao);
}
function update_diachi($dia_chi, $id){
    $sql = "UPDATE dia_chi set dia_chi = ? where id = ?";
    execute($sql,$dia_chi, $id);
}

// Khách sạn--------------------------------------------
function insert_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$ngay_tao) {
    $sql = "INSERT INTO khach_san(ten_ks,anh,mo_ta,id_dc,dia_chi_ct,sdt,ngay_tao) values(?,?,?,?,?,?,?)";
    return execute($sql, $ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$ngay_tao);
}

function update_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id){
    $sql = "UPDATE khach_san set ten_ks = ?,anh = ?,mo_ta = ?,id_dc = ?,dia_chi_ct = ?,sdt = ? where id = ?";
    return execute($sql,$ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
}

// Phương tiện-----------------------------------------
function insert_phuongtien($ten, $bien_so, $so_ghe, $anh, $ngay_tao){
    $sql = "INSERT INTO phuong_tien(ten, bien_so, so_ghe, anh, ngay_tao) VALUES(?, ?, ?, ?, ?)";
    execute($sql, $ten, $bien_so, $so_ghe, $anh, $ngay_tao);
}
function update_phuongtien($ten, $bien_so, $so_ghe,$anh, $id){
    $sql = "UPDATE phuong_tien set ten = ?, bien_so =?, so_ghe = ?, anh = ? where id = ?";
    execute($sql, $ten, $bien_so, $so_ghe,$anh, $id);
}
//Tour----------------------------------------------------
function insert_tour($ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia ,$ngay_tao){
    $sql = "INSERT INTO tour(ten, id_diachi, anh, id_danhmuc, ngay_di, ngay_den, noi_di, mo_ta, thong_tin, gia , ngay_tao) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia ,$ngay_tao);
}
function update_tour($ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia, $ngay_sua, $id){
    $sql = "UPDATE tour set ten = ?, id_diachi = ?, anh = ? ,id_danhmuc = ?, ngay_di = ?, ngay_den = ?, noi_di = ?, mo_ta =?, thong_tin = ?, gia = ?, ngay_sua = ? where id = ?";
    execute($sql, $ten, $id_diachi, $anh, $id_danhmuc, $ngay_di, $ngay_den, $noi_di, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
}

// Đơn hàng ---------------------------------------------
function insert_donhang($id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $ngay_tao){
    $sql = "INSERT INTO don_hang(id_tour, id_kh, nguoi_lon, tre_em, ngay_di, noi_di, gia, lich_trinh, ngay_tao) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $ngay_tao);
}
function update_donhang($id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $id){
    $sql = "UPDATE don_hang set id_tour = ?, id_kh = ?, nguoi_lon = ?, tre_em = ?, ngay_di = ?, noi_di = ?, gia = ?, lich_trinh = ? where id = ?";
    execute($sql, $id_tour, $id_kh, $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $id);
}
function update_deposit($table, $value, $id){
    $sql = "UPDATE $table set dat_coc = ? where id = ?";
    execute($sql, $value, $id);
}

// lấy danh sách đơn hàng có tour cố định
function select_distinct(){
    $sql1 = "SELECT * FROM tour where id_danhmuc = 2";
    $tours = query($sql1);
    $result = [];
    foreach($tours as $tour){
        $sql = "SELECT * FROM don_hang where id_tour = " . $tour['id'] . " order by ngay_tao DESC limit 0,1"; 
        if(!empty(query($sql))){
            array_push($result, query($sql));
        }
    }
    return $result;
}
function select_status_order($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = " . $id_tour . " and trang_thai = 1"; 
    return query($sql);
}
function select_deposit_order($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = " . $id_tour . " and dat_coc = 1"; 
    return query($sql);
}
// lấy danh sách đơn hàng có tour linh động
function select_order_linh_dong(){
    $sql1 = "SELECT * FROM tour where id_danhmuc = 1";
    $tours = query($sql1);
    $result = [];
    foreach($tours as $tour){
        $sql = "SELECT * FROM don_hang where id_tour = " . $tour['id'] . " order by ngay_tao DESC";
        if(!empty(query($sql))){
            array_push($result, query($sql));
        }
    }
    return $result;
}
// lấy danh sách khách hàng đặt tour linh động
function select_user_by_id_tour($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = $id_tour order by ngay_tao DESC";
    $order_distinct = query($sql);
    $result = [];
    foreach($order_distinct as $user){
        $sql = "SELECT * FROM khach_hang where id = " . $user['id_kh'] ;
        if(!empty(query($sql))){
            array_push($result, query($sql));
        }
    }
    return $result;
}
// lấy danh sách đơn hàng cùng 1 tour cố định
function select_order_by_id_tour($id_tour){
    $sql = "SELECT * FROM don_hang where id_tour = $id_tour order by ngay_tao DESC";
    return query($sql);
}
// --------------------------- Danh Mục ------------------
function insert_danhmuc($ten,$date){
    $sql ="INSERT INTO danh_muc(ten,ngay_tao) VALUES(?,?)"; 
     execute($sql, $ten,$date);
}
function update_danhmuc($ten,$id){
    $sql ="UPDATE danh_muc set ten = ? where id = ?"; 
    execute($sql, $ten,$id);
}
/// tìm kiếm theo danh mục 
function tour_by_category($id_danhmuc)
{
    $sql = "SELECT * from tour where  id_danhmuc = $id_danhmuc";
    return query($sql);
}
// tìm kiếm theo tên

// Slider
function insert_slide($ten_slide, $anh, $url, $date) {
    $sql = "INSERT INTO slider(ten_slide,image,url,ngay_tao) values(?,?,?,?)";
    return execute($sql,$ten_slide, $anh, $url, $date);
}

function update_slide($ten_slide, $image, $url, $id){
    $sql = "UPDATE slider set ten_slide = ?, image =?, url = ? where id = ?";
    execute($sql, $ten_slide, $image, $url, $id);
}
?>
