<?php
// chuỗi tạo bởi dấu " cho phép nhúng các biến của PHP vào trong chuỗi
// chuỗi tạo bởi dấu ' không hỗ trợ
$hoTen = 'Namtvph13226';
$xinChao = "Hello $hoTen";
echo $xinChao;
echo '<br>';
//heredoc giống khi dùng "
//nowdoc giống khi dùng '
$heredoc = <<<HERE
    Hello Poly 
    <br>
    Hello $hoTen;
HERE;
echo $heredoc;
$nowdoc = <<<'NOW'
    Hello $hoTen
NOW;


?>