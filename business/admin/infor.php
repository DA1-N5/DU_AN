<?php
   function infor_list(){
    $values = getSelect("gioi_thieu",0,10);
    admin_render("infor/list.php", ["values" => $values]);
   
}
function infor_add(){
    admin_render("infor/add.php");
}
function infor_save_add(){
    extract($_REQUEST);
    if(empty($ten)){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: ". BASE_URL ."/admin/infor/add");
        die;
    }
    $ton_tai = getSelect_one('gioi_thieu', 'noi_dung', $ten);
    if(!empty($ton_tai)){
        $_SESSION['error'] = "Tên Danh mục đã tồn tại!";
        header("Location: ". BASE_URL ."/admin/infor/add");
        die;
    }
    $date = date('Y-m-d');
    insert_gioithieu($ten,$date);
    header("Location: ". BASE_URL ."/admin/infor/list");
}
function infor_update(){
    if(!isset($_GET['id'])) {
        header("Location: ". BASE_URL ."/admin/infor/list");
        die;
    }
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $result = getSelect_one('gioi_thieu', 'id', $id);
    admin_render('infor/update.php',['result' => $result]);
}
function infor_save_update(){
    extract($_REQUEST);
    if(empty($ten)){
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location:".BASE_URL."/admin/infor/update?id=$id");
        die;
    }
    $ton_tai = getSelect_one('gioi_thieu', 'noi_dung', $ten);
    if(!empty($ton_tai) && $ten != $ten_cu){
        $_SESSION['error'] = "Tên danh mục đã tồn tại!";
        header("Location:".BASE_URL."/admin/infor/update?id=$id");
        die;
    }   
    update_gioithieu($ten,$id);
    header("Location:".BASE_URL."/admin/infor/list");
}
function  infor_delete(){
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        getDelete('gioi_thieu', 'id', $id);
    }
    header("Location:" . BASE_URL .  "/admin/infor/list");  
}
function infor_status(){
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $status = intval($_GET['st']);
        if($status == 1){
            update_status('gioi_thieu', 2, $id);
        } else if($status == 2){
            update_status('gioi_thieu', 1, $id);
        }
    }
    header("Location:" . BASE_URL .  "/admin/infor/list");  
}

?>