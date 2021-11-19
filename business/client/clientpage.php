<?php
function client_homepage(){
    $tour = getSelect("tour", 0, 10);
    client_render('homepage.php', ["result" => $tour]);
}
function client_detail(){
    $value = getSelect_one("tour", "id", intval($_GET['id']));
    $comment = [];
    client_render('detail.php', [
        "value" => $value,
        "comment" => $comment
    ]);
}
?>